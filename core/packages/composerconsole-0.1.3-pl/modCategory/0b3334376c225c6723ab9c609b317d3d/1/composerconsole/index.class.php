<?php

class IndexManagerController extends ComposerConsoleBaseManagerController {
    public static function getDefaultController() { return 'home'; }
}

abstract class ComposerConsoleBaseManagerController extends modExtraManagerController {

    function __construct(modX &$modx, $config = array()) {
        parent::__construct($modx, $config);
        $this->config['namespace_path'] = $this->translatePath($this->config['namespace_path']);
        $this->config['manager_url'] = $modx->getOption('composerconsole.manager_url', null, $modx->getOption('manager_url').'components/composerconsole/');
        $this->config['connector_url'] = $this->config['manager_url'].'connector.php';
    }

    function initialize(){
        $this->addJavascript($this->config['manager_url'].'js/composerconsole.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            ComposerConsole.config.connector_url = "'.$this->config['connector_url'].'";
        });
        </script>');
    }

    public function getLanguageTopics() {
        return array('composerconsole:default');
    }

    public function checkPermissions() { return true;}

    public function translatePath($path) {
        return $this->modx->call('modNamespace','translatePath',array(&$this->modx, $path));
    }
}