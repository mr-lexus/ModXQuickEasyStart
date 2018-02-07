<?php

/**
 * A transliteration service implementation class for MODx Revolution.
 *
 * @package modx
 * @subpackage ytranslit
 */
class modTransliterate
{

    /**
     * A reference to the modX instance communicating with this service instance.
     * @var modX
     */
    public $modx = null;
    /**
     * A collection of options.
     * @var array
     */
    public $options = array();


    /**
     * Constructs a new instance of the modTransliterate class.
     *
     * Use modX::getService() to get an instance of the translit service; do not manually construct this class.
     *
     * @param modX &$modx A reference to a modX instance.
     * @param array $options An array of options for configuring the modTransliterate instance.
     */
    public function __construct(modX &$modx, array $options = array())
    {
        $this->modx = &$modx;
        $this->options = $options;
    }


    /**
     * Translate a string using a named transliteration table.
     *
     * @param string $string The string to transliterate.
     *
     * @return string The translated string.
     */
    public function translate($string)
    {
        $exclude = $this->modx->getOption('friendly_alias_ytranslit_exclude', '', '/^[_-a-zA-z\d\s\:\(\)]+$/i', true);
        if (empty($string) || preg_match($exclude, $string)) {
            return $string;
        }

        $extension = '';
        if (preg_match('#\.[0-9a-z]+$#i', $string, $matches)) {
            $extension = $matches[0];
            $string = preg_replace('#' . $extension . '$#', '', $string);
        }

        $trim = $this->modx->getOption('friendly_alias_trim_chars', null, '/.-_', true);
        $string = str_replace(str_split($trim), ' ', $string);

        $service = $this->modx->getOption('friendly_alias_ytranslit_url', null,
            'https://translate.yandex.net/api/v1.5/tr.json/translate?key=[[+key]]&lang=ru-en&text=', true);
        $key = trim($this->modx->getOption('friendly_alias_ytranslit_key', null, ''));
        if (empty($key)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,
                '[yTranslit] You must specify the API key! Please, get it from http://api.yandex.ru/key/form.xml?service=trnsl.');

            return $string;
        } else {
            $request = str_replace('[[+key]]', $key, $service) . urlencode($string);
            if (function_exists('curl_init')) {
                $url = parse_url($request);
                parse_str($url['query'], $params);
                /** @var modRestCurlClient $client */
                $client = $this->modx->getService('rest.modRestCurlClient');
                $result = $client->request(
                    $url['scheme'] . '://' . $url['host'],
                    $url['path'],
                    'GET',
                    $params,
                    array(
                        'curlopt_timeout' => $this->modx->getOption('friendly_alias_ytranslit_timeout', null, 1, true),
                        'curlopt_returntransfer' => 1,
                    )
                );
            } else {
                $result = file_get_contents($request);
            }

            $arr = $this->modx->fromJSON($result);
            if (!is_array($arr)) {
                $this->modx->log(modX::LOG_LEVEL_ERROR,
                    "[yTranslit] Service unavailable.\nRequest: $request.\nResponse: $result");
            } elseif ($arr['code'] != 200 || empty($arr['text'][0])) {
                $this->modx->log(modX::LOG_LEVEL_ERROR,
                    '[yTranslit] Service returned an error. ' . print_r($arr, true));
            } else {
                $string = $arr['text'][0];
            }

            return $string . strtolower($extension);
        }
    }
}
