<?php

require_once dirname(__FILE__) . '/console.class.php';

class ccSaveFileProcessor extends modConsoleProcessor{
    
    public function process() {

        $content = $this->getProperty('content','');
        $composer_dir = $this->modx->getOption('composerconsole.composer_dir');

        $f = $composer_dir . '/composer.json';

        if (@file_put_contents($f,$content) === false) {
            return $this->failure($this->modx->lexicon('composerconsole.err_json_save'));
        }

        return $this->success(true);
    }
}

return 'ccSaveFileProcessor';