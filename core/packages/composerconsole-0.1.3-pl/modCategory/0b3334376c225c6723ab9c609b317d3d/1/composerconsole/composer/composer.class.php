<?php

/**
 * The base class for modQueue.
 */
class composer
{
    /* @var modX $modx */
    public $modx;

    public $config = array();

    protected $composer;

    /**
     * @param modX $modx
     * @param array $config
     */
    public function __construct(modX &$modx, array $config = array())
    {
        $this->modx =& $modx;
        if(!class_exists('\GetComposer')) {
            require_once dirname(__FILE__) . '/GetComposer.class.php';
        }
        $this->config['composer_dir'] = $this->modx->getOption('composerconsole.composer_dir');
        $verbose = $this->modx->getOption('composerconsole.verbose',null,1);
        $this->composer = new GetComposer($this->config['composer_dir']);
        $this->composer->setVerbose($verbose);
    }

    public function command($command, $repository = null)
    {
        if(is_string($repository)) {
            $repository = array(
                'type' => 'vcs',
                'url' => $repository
            );
        }
        if(is_array($repository)) {
            $this->addRepository($repository);
        }
        return $this->composer->command($command);
    }

    public function addRepository(array $repository)
    {
        $composer_json_file = $this->config['composer_dir'].'/composer.json';

        if(!$repository || !is_array($repository) || !is_file($composer_json_file)) return false;

        $composer = json_decode(file_get_contents($composer_json_file), true);
        if($composer) {
            $type = $repository['type'];
            $url = $repository['url'];
            if(is_array($composer['repositories'])) {
                foreach ($composer['repositories'] as $rep) {
                    if ($rep['type'] == $type && $rep['url'] == $url) {
                        return true;
                    }
                }
            } else {
                $composer['repositories'] = array();
            }
            $composer['repositories'][] = $repository;
            if(file_put_contents($composer_json_file, json_encode($composer, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES))) {
                return true;
            }
        }

        return false;
    }

}