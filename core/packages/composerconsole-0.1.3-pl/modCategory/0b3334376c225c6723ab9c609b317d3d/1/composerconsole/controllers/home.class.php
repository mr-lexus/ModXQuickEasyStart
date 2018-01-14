<?php

class ComposerConsoleHomeManagerController extends ComposerConsoleBaseManagerController {

    public function process(array $scriptProperties = array()) {

    }
    public function getPageTitle() {
        return $this->modx->lexicon('composerconsole');
    }

    public function loadCustomCssJs() {
        $this->addCss($this->config['manager_url'].'css/mgr.css');
        $this->addJavascript($this->config['manager_url'].'js/widgets/home.panel.js');
        $this->addLastJavascript($this->config['manager_url'].'js/sections/home.js');
    }

    public function getTemplateFile() {
        return $this->config['namespace_path'].'templates/home.tpl';
    }
}