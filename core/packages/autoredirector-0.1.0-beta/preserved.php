<?php return array (
  '223f2f3fd406a08bc577af8c8bda2b04' => 
  array (
    'criteria' => 
    array (
      'name' => 'autoredirector',
    ),
    'object' => 
    array (
      'name' => 'autoredirector',
      'path' => '{core_path}components/autoredirector/',
      'assets_path' => '',
    ),
  ),
  '9070cc31388f2ba2991e948a2346a0c7' => 
  array (
    'criteria' => 
    array (
      'namespace' => 'autoredirector',
      'controller' => 'index',
    ),
    'object' => 
    array (
      'id' => 8,
      'namespace' => 'autoredirector',
      'controller' => 'index',
      'haslayout' => 1,
      'lang_topics' => 'autoredirector:default',
      'assets' => '',
      'help_url' => '',
    ),
  ),
  '93742376ab37dee6449453c62df8198b' => 
  array (
    'criteria' => 
    array (
      'text' => 'autoredirector',
    ),
    'object' => 
    array (
      'text' => 'autoredirector',
      'parent' => 'components',
      'action' => '8',
      'description' => 'autoredirector_menu_desc',
      'icon' => 'images/icons/plugin.gif',
      'menuindex' => 0,
      'params' => '',
      'handler' => '',
      'permissions' => '',
      'namespace' => 'core',
    ),
  ),
  'f672fde28351dde3c2c8bb0c8e4e4f9a' => 
  array (
    'criteria' => 
    array (
      'category' => 'autoRedirector',
    ),
    'object' => 
    array (
      'id' => 33,
      'parent' => 14,
      'category' => 'autoRedirector',
      'rank' => 0,
    ),
  ),
  '566a1cb31c90e68b61678dcd571c3d43' => 
  array (
    'criteria' => 
    array (
      'name' => 'autoRedirector',
    ),
    'object' => 
    array (
      'id' => 24,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'autoRedirector',
      'description' => '',
      'editor_type' => 0,
      'category' => 33,
      'cache_type' => 0,
      'plugincode' => '$resourceEvents = array(\'OnBeforeDocFormSave\', \'OnDocFormSave\');
if (in_array($modx->event->name, $resourceEvents)) {
    foreach($scriptProperties as & $object){
        if(
            is_object($object)
            AND $object instanceof modResource
            AND $original = $modx->getObject(\'modResource\', $object->id)
        ){
            $resource = $object;
            break;
        }
    }
}
switch ($modx->event->name) {
    case "OnManagerPageInit":
	$cssFile = MODX_ASSETS_URL.\'components/autoredirector/css/mgr/main.css\';
	$modx->regClientCSS($cssFile);
	break;

    case "OnBeforeDocFormSave":
        $resources = array(
                $resource,
                $modx->getObject(\'modResource\',$resource->get(\'parent\'))
            );
        if($child_ids = $modx->getChildIds($resource->id,50,array(\'context\' => $resource->context_key))){
            $resources = array_merge($resources, $modx->getCollection(\'modResource\',array("id:IN" => $child_ids)));
        }
    case "OnResourceBeforeSort":
        if (empty($resources)) {
            foreach ($nodes as $node) {
                $resources[] = $modx->getObject(\'modResource\',$node[\'id\']);
            }
        }
        foreach ($resources as $res) {
            if (!empty($res)) {
                if (!$res->getProperty(\'old_uri\',\'autoredirector\')) {
                    $res->setProperty(\'old_uri\',$res->get(\'uri\'),\'autoredirector\');
                    $res->save();
                }
            }
        }
        break;
    case "OnDocFormSave":
        $resources = array(
                $resource,
                $modx->getObject(\'modResource\',$resource->get(\'parent\'))
            );
        if($child_ids = $modx->getChildIds($resource->id,50,array(\'context\' => $resource->context_key))){
            $resources = array_merge($resources, $modx->getCollection(\'modResource\',array("id:IN" => $child_ids)));
        }
    case "OnResourceSort":
        if (empty($resources)) {
            foreach ($nodesAffected as $node) {
                $resources[] = $node;
            }
        }
        $modelPath = $modx->getOption(\'autoredirector_core_path\',null,$modx->getOption(\'core_path\').\'components/autoredirector/\').\'model/\';
		$modx->addPackage(\'autoredirector\', $modelPath);
        $processorProps = array(\'processors_path\' => $modx->getOption(\'autoredirector_core_path\',null,$modx->getOption(\'core_path\').\'components/autoredirector/\').\'processors/\');
        foreach ($resources as $res) {
            if (!empty($res)) {
                $old_uri = $res->getProperty(\'old_uri\',\'autoredirector\');
                $current_uri = $res->getAliasPath($res->get(\'alias\'));
                if ($old_uri && $current_uri != $old_uri) {
                    $currentRuleQ = array(\'uri\' => $current_uri);
                    if (!$modx->getOption(\'global_duplicate_uri_check\')) {
                        $currentRuleQ[\'context_key\'] = $res->get(\'context_key\');
                    }
                    if ($currentRule = $modx->getObject(\'arRule\', $currentRuleQ)) {
                        $response = $modx->runProcessor(\'mgr/item/remove\', $currentRule->toArray(), $processorProps);
                        if ($response->isError()) {
                            $modx->log(modX::LOG_LEVEL_ERROR, \'AutoRedirector removing error. Message: \'.$response->getMessage());
                        }
                    }
                    $arRule = array(\'uri\' => $old_uri
                        , \'context_key\' => $res->get(\'context_key\')
                        , \'res_id\' => $res->get(\'id\'));
                    if (!$modx->getObject(\'arRule\', $arRule)) {
                        $response = $modx->runProcessor(\'mgr/item/create\', $arRule, $processorProps);
                        if ($response->isError()) {
                            $modx->log(modX::LOG_LEVEL_ERROR, \'AutoRedirector creating error. Message: \'.$response->getMessage());
                        }
                    }
                }
                $res->setProperty(\'old_uri\',$current_uri,\'autoredirector\');
                $res->save();
            }
        }
        break;
    case "OnPageNotFound":
        $uri = $_SERVER[\'REQUEST_URI\'];
        $uri = str_replace($modx->getOption("site_url"),"",$uri);
        if (substr($uri, 0, 1) == "/") $uri = substr($uri, 1);
        $uri = urldecode($uri);

        $RuleQ = array(\'uri\' => $uri);
        if (!$modx->getOption(\'global_duplicate_uri_check\')) {
            $RuleQ[\'context_key\'] = $modx->context->get(\'key\');
        }
        $modelPath = $modx->getOption(\'autoredirector_core_path\',null,$modx->getOption(\'core_path\').\'components/autoredirector/\').\'model/\';
    	$modx->addPackage(\'autoredirector\', $modelPath);
        if ($Rule = $modx->getObject(\'arRule\', $RuleQ)) {
            if ($url = $modx->makeUrl($Rule->get(\'res_id\'))) {
                $modx->sendRedirect($url,array(\'responseCode\' => \'HTTP/1.1 301 Moved Permanently\'));
            }
        }
        break;
}',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/autoredirector/elements/plugins/plugin.autoredirector.php',
      'content' => '$resourceEvents = array(\'OnBeforeDocFormSave\', \'OnDocFormSave\');
if (in_array($modx->event->name, $resourceEvents)) {
    foreach($scriptProperties as & $object){
        if(
            is_object($object)
            AND $object instanceof modResource
            AND $original = $modx->getObject(\'modResource\', $object->id)
        ){
            $resource = $object;
            break;
        }
    }
}
switch ($modx->event->name) {
    case "OnManagerPageInit":
	$cssFile = MODX_ASSETS_URL.\'components/autoredirector/css/mgr/main.css\';
	$modx->regClientCSS($cssFile);
	break;

    case "OnBeforeDocFormSave":
        $resources = array(
                $resource,
                $modx->getObject(\'modResource\',$resource->get(\'parent\'))
            );
        if($child_ids = $modx->getChildIds($resource->id,50,array(\'context\' => $resource->context_key))){
            $resources = array_merge($resources, $modx->getCollection(\'modResource\',array("id:IN" => $child_ids)));
        }
    case "OnResourceBeforeSort":
        if (empty($resources)) {
            foreach ($nodes as $node) {
                $resources[] = $modx->getObject(\'modResource\',$node[\'id\']);
            }
        }
        foreach ($resources as $res) {
            if (!empty($res)) {
                if (!$res->getProperty(\'old_uri\',\'autoredirector\')) {
                    $res->setProperty(\'old_uri\',$res->get(\'uri\'),\'autoredirector\');
                    $res->save();
                }
            }
        }
        break;
    case "OnDocFormSave":
        $resources = array(
                $resource,
                $modx->getObject(\'modResource\',$resource->get(\'parent\'))
            );
        if($child_ids = $modx->getChildIds($resource->id,50,array(\'context\' => $resource->context_key))){
            $resources = array_merge($resources, $modx->getCollection(\'modResource\',array("id:IN" => $child_ids)));
        }
    case "OnResourceSort":
        if (empty($resources)) {
            foreach ($nodesAffected as $node) {
                $resources[] = $node;
            }
        }
        $modelPath = $modx->getOption(\'autoredirector_core_path\',null,$modx->getOption(\'core_path\').\'components/autoredirector/\').\'model/\';
		$modx->addPackage(\'autoredirector\', $modelPath);
        $processorProps = array(\'processors_path\' => $modx->getOption(\'autoredirector_core_path\',null,$modx->getOption(\'core_path\').\'components/autoredirector/\').\'processors/\');
        foreach ($resources as $res) {
            if (!empty($res)) {
                $old_uri = $res->getProperty(\'old_uri\',\'autoredirector\');
                $current_uri = $res->getAliasPath($res->get(\'alias\'));
                if ($old_uri && $current_uri != $old_uri) {
                    $currentRuleQ = array(\'uri\' => $current_uri);
                    if (!$modx->getOption(\'global_duplicate_uri_check\')) {
                        $currentRuleQ[\'context_key\'] = $res->get(\'context_key\');
                    }
                    if ($currentRule = $modx->getObject(\'arRule\', $currentRuleQ)) {
                        $response = $modx->runProcessor(\'mgr/item/remove\', $currentRule->toArray(), $processorProps);
                        if ($response->isError()) {
                            $modx->log(modX::LOG_LEVEL_ERROR, \'AutoRedirector removing error. Message: \'.$response->getMessage());
                        }
                    }
                    $arRule = array(\'uri\' => $old_uri
                        , \'context_key\' => $res->get(\'context_key\')
                        , \'res_id\' => $res->get(\'id\'));
                    if (!$modx->getObject(\'arRule\', $arRule)) {
                        $response = $modx->runProcessor(\'mgr/item/create\', $arRule, $processorProps);
                        if ($response->isError()) {
                            $modx->log(modX::LOG_LEVEL_ERROR, \'AutoRedirector creating error. Message: \'.$response->getMessage());
                        }
                    }
                }
                $res->setProperty(\'old_uri\',$current_uri,\'autoredirector\');
                $res->save();
            }
        }
        break;
    case "OnPageNotFound":
        $uri = $_SERVER[\'REQUEST_URI\'];
        $uri = str_replace($modx->getOption("site_url"),"",$uri);
        if (substr($uri, 0, 1) == "/") $uri = substr($uri, 1);
        $uri = urldecode($uri);

        $RuleQ = array(\'uri\' => $uri);
        if (!$modx->getOption(\'global_duplicate_uri_check\')) {
            $RuleQ[\'context_key\'] = $modx->context->get(\'key\');
        }
        $modelPath = $modx->getOption(\'autoredirector_core_path\',null,$modx->getOption(\'core_path\').\'components/autoredirector/\').\'model/\';
    	$modx->addPackage(\'autoredirector\', $modelPath);
        if ($Rule = $modx->getObject(\'arRule\', $RuleQ)) {
            if ($url = $modx->makeUrl($Rule->get(\'res_id\'))) {
                $modx->sendRedirect($url,array(\'responseCode\' => \'HTTP/1.1 301 Moved Permanently\'));
            }
        }
        break;
}',
    ),
  ),
  'f55a357b89d8504e7aadecd10f07377c' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 24,
      'event' => 'OnManagerPageInit',
    ),
    'object' => 
    array (
      'pluginid' => 24,
      'event' => 'OnManagerPageInit',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '9de185f75679fe77c0c71c26ccdc3f78' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 24,
      'event' => 'OnPageNotFound',
    ),
    'object' => 
    array (
      'pluginid' => 24,
      'event' => 'OnPageNotFound',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);