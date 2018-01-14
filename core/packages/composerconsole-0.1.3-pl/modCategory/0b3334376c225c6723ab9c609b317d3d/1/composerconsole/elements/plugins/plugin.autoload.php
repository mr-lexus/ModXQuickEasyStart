<?php
$autoloader = $modx->getOption('composerconsole.composer_dir').'/vendor/autoload.php';
if(is_file($autoloader)) {
    require_once $autoloader;
}