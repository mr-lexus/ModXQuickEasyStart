<?php


ini_set('display_errors', 1);
ini_set('error_reporting', -1);

require_once dirname(__FILE__) . '/console.class.php';
require_once dirname(__DIR__) . '/composer/GetComposer.class.php';

class ccComandProcessor extends modConsoleProcessor{
    
    public function process() {

        $command = $this->getProperty('command','list');
        $composer_dir = $this->modx->getOption('composerconsole.composer_dir');
        $verbose = $this->modx->getOption('composerconsole.verbose',null,1);
        $cc = new GetComposer($composer_dir);
        $cc->setVerbose($verbose);
        $output = $cc->command($command);
        $output =  $cc->getCommand().PHP_EOL."-------------------------------------".PHP_EOL.$output;
        $completed = true;

        return $this->modx->toJSON(array('completed' => $completed, 'output' => $output));
    }
}

return 'ccComandProcessor';