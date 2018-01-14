<?php

$config_core = dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
if(!file_exists($config_core)) {
    $config_core = dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/config.core.php';
}
require_once $config_core;
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$modx->lexicon->load('composerconsole:default');

/* handle request */
$processor_path = $modx->getOption('composerconsole.core_path', null, $modx->getOption('core_path').'components/composerconsole/').'processors/';
$modx->request->handleRequest(array(
    'processors_path' => $processor_path,
    'location' => '',
));