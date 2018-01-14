<?php

class GetComposer
{
    private $installerDir;
    private $homeDir;
    private $verbose;
    private $command;
    private $autoload_path;

    function __construct($homeDir = null, $installerDir = null) {
        $this->installerDir = $this->dir(empty($installerDir) ? __DIR__ : $installerDir);
        if(empty($homeDir)) {
            $homeDir = $this->installerDir.'/global';
            mkdir($homeDir);
        }
        $this->homeDir = $this->dir($homeDir);
    }

    private function dir($dir) {
        if(empty($dir)|| !is_dir($dir)) {
            throw new Exception('Error dir: '.$dir);
        }
        return $dir;
    }

    /*
     * Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
     * */
    public function setVerbose($verbose) {
        switch($verbose) {
            case 1: $this->verbose = ' -v'; break;
            case 2: $this->verbose = ' -vv'; break;
            case 3: $this->verbose = ' -vvv'; break;
            default: $this->verbose = '';
        }
    }

    private function prepareCommand($command) {
        $this->command = $command.' -d '.$this->homeDir.$this->verbose;
        return $this->command;
    }

    public function getCommand() {
        return $this->command;
    }

    public function command($command) {
        $command = $this->prepareCommand($command);
        if($this->installComposer()) {
            ob_start();
            putenv('COMPOSER_HOME='.$this->installerDir.'/global');
            putenv('SSL_CERT_FILE='.$this->installerDir.'/cacert.pem');
            require_once($this->autoload_path);
            $input = new Symfony\Component\Console\Input\StringInput($command);
            $output = new Symfony\Component\Console\Output\StreamOutput(fopen('php://output','w'));
            $app = new Composer\Console\Application();
            $app->setAutoExit(false);
            $app->run($input,$output);
            $output = ob_get_clean();
            return $output;
        }
        return false;
    }

    public function installComposer() {

        $pharFile = $this->installerDir.'/composer.phar';
        $installerFile = $this->installerDir.'/installer.php';
        $cacertFile = $this->installerDir.'/cacert.pem';

        if(is_file($pharFile)) {

            $this->autoload_path = 'phar://'.$pharFile.'/vendor/autoload.php';
            return true;

        } elseif(is_file($installerFile)) {

            if(is_file($cacertFile)) {
                $argv = array('--cafile',$cacertFile);
            } else {
                $argv = array('--disable-tls');
            }

            $argv = array_merge($argv,array('--install-dir',$this->installerDir));

            // replace exit on return
            $str = file_get_contents($installerFile);
            $str = preg_replace('/\sexit\s*\(/',' return (',$str);
            if($str !== NULL) file_put_contents($installerFile,$str);

            ob_start();
            include $installerFile;
            $output = ob_get_clean();

            if(is_file($pharFile)) {
                return $this->installComposer();
            } else {
                throw new Exception('Could not install composer (installer: '.$installerFile.' '.implode(' ',$argv).').'.$output);
            }

        } else {

            $installerURL = 'https://getcomposer.org/installer';
            $ch = curl_init($installerURL);
            if(is_file($cacertFile)) curl_setopt($ch, CURLOPT_CAINFO, $cacertFile);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_FILE, fopen($installerFile, 'w+'));

            if (curl_exec($ch) && is_file($installerFile)){
                return $this->installComposer();
            } else {
                throw new Exception('Could not download installer composer (url: '.$installerURL.').');
            }
        }

    }
}