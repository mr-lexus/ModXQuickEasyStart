<?php

require_once dirname(__FILE__) . '/console.class.php';

class ccLoadFileProcessor extends modConsoleProcessor{
    
    public function process() {

        $composer_dir = $this->modx->getOption('composerconsole.composer_dir');

        $f = $composer_dir . '/composer.json';

        if (is_file($f)) {
            $code = @file_get_contents($f);
        } else {
            return $this->failure($this->modx->lexicon('composerconsole.err_json_nf'));
        }

        return $this->success($code);
    }
}

return 'ccLoadFileProcessor';