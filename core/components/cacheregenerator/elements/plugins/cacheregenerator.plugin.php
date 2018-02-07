<?php
if(!function_exists('cacheRegenerate')){
    function cacheRegenerate($scriptProperties, $id = 0){
        global $modx;
        
        @error_reporting(false);
        
        // Hack. Prevent headers
        print " ";
        
        $placeholders = $modx->placeholders;
        
        ini_set('max_execution_time', 3600);
        ignore_user_abort(1);
        
        $modx->user = $modx->newObject("modUser");
            
        $modx->request = null;
        
        $modx->getRequest();
        
        $q = $modx->newQuery('modResource',[
            "class_key:not in"  => array("modWebLink", "modSymLink"),
        ]);
        
        $q->select(array(
            "id",    
            "context_key",    
        ));
        
        # $q->where(array(
        #     "id:in" => array()
        # ));
        
        
        
        if($id){
            $q->where((int)$id);
        }
        else{
            $q->where(array(
                "deleted"   => 0,
                "published" => 1,
                "cacheable" => 1,
            ));
        }   
        
        
        // Exclude by id
        if($exclude_docs_id = trim($modx->getOption("cacheregenerator.exclude_docs_id", $scriptProperties, false))){
            $q->where(array(
                "id:not in" => explode(",", $exclude_docs_id),
            ));
        }
        
        // Exclude by templates
        if($exclude_doc_templates_id = trim($modx->getOption("cacheregenerator.exclude_doc_templates_id", $scriptProperties, false))){
            $q->where(array(
                "template:not in" => explode(",", $exclude_doc_templates_id),
            ));
        }
        
        if(!$modx->getOption("cacheregenerator.regenerate_unsearchable_docs", $scriptProperties, true)){
            $q->where(array(
                "searchable" => 1,
            ));
        }
        
        $s = $q->prepare();
        
        # print $q->toSQL();
        
        $s->execute();
        
        $i = 0;
        
        while($row = $s->fetch(2)){
            if(!(int)$row['id']){
                continue;
            }
            
            if(
                $modx->context->key != $row['context_key']
                AND !$modx->switchContext($row['context_key'])
            ){
                continue;
            }
            
            $modx->resourceIdentifier = $row['id'];
            $_REQUEST['id'] = $modx->resourceIdentifier;
            
            $modx->jscripts = array();
            $modx->sjscripts = array();
            $modx->loadedjscripts = array();
            
            if(
                $resource = $modx->getObject("modResource", $modx->resourceIdentifier)
                AND $resource->checkPolicy('load')
                AND $resource->checkPolicy('view')
                AND $modx->resource = $modx->request->getResource('id', $modx->resourceIdentifier)
            ){
                
                
                if(!$modx->resource->getProcessed()){
                    
                    if(!($modx->resource instanceof modDocument)){
                        continue;
                    }
                    
                    if(
                        $i = ob_get_level()
                        AND $i > 0
                    ){
                        while($i > 0){
                            ob_end_flush();
                            $i--;
                        }
                    }
                    
                    $modx->placeholders = $placeholders;
                    
                    $modx->elementCache = array();
                    
                    unset($modx->smarty, $modx->services['smarty']);
                    
                    $modx->invokeEvent("OnHandleRequest");
                    
                    $modx->resource->_output= $modx->resource->process();
                    
                    if($modx->jscripts){
                        $modx->resource->set("_jscripts", $modx->jscripts);
                    }
                    
                    if($modx->sjscripts){
                        $modx->resource->set("_sjscripts", $modx->sjscripts);
                    }
                    
                    if($modx->loadedjscripts){
                        $modx->resource->set("_loadedjscripts", $modx->loadedjscripts);
                    }
                    
                    $options = array();
                    
                    
                    $modx->getParser();
                    $maxIterations= intval($modx->getOption('parser_max_iterations', $options, 10));
                    $modx->parser->processElementTags('', $modx->resource->_output, true, false, '[[', ']]', array(), $maxIterations);
                    $modx->parser->processElementTags('', $modx->resource->_output, true, true, '[[', ']]', array(), $maxIterations);
                    
                    
                    /*FIXME: only do this for HTML content ?*/
                    if (strpos($modx->resource->ContentType->mime_type, 'text/html') !== false) {
                        /* Insert Startup jscripts & CSS scripts into template - template must have a </head> tag */
                        if (($js= $modx->getRegisteredClientStartupScripts()) && (strpos($modx->resource->_output, '</head>') !== false)) {
                            /* change to just before closing </head> */
                            $modx->resource->_output= preg_replace("/(<\/head>)/i", $js . "\n\\1", $modx->resource->_output,1);
                        }
                    
                        /* Insert jscripts & html block into template - template must have a </body> tag */
                        if ((strpos($modx->resource->_output, '</body>') !== false) && ($js= $modx->getRegisteredClientScripts())) {
                            $modx->resource->_output= preg_replace("/(<\/body>)/i", $js . "\n\\1", $modx->resource->_output,1);
                        }
                    }
                    
                    $modx->beforeRender();
                    $modx->error->reset();
                    
                    $modx->cacheManager->generateResource($modx->resource);
                    $modx->error->reset();
                    
                    ob_start();
                    
                    $i++;
                }
                
                $modx->error->reset();
            }
            
            $modx->error->reset();
        }
        $modx->error->reset();
        
    }
}


switch($modx->event->name){
    
    case 'OnDocFormSave':
        
        if(
            !empty($object) 
            AND ($object instanceof modResource)
            AND !$object->syncsite
            AND !$object->clearCache
        ){
            
            $object->clearCache($object->context_key);
            
            cacheRegenerate($scriptProperties, $object->id);
            $modx->error->reset();
            
            // Regenerate all resources
            if($modx->getOption("cacheregenerator.regenerate_docs_on_doc_save", $scriptProperties, false)){
                cacheRegenerate($scriptProperties);
            }
            $modx->error->reset();
        }
        
        break;
    
    case 'OnSiteRefresh':
            
        // Regenerate all resources
        if($modx->getOption("cacheregenerator.regenerate_docs_on_site_refresh", $scriptProperties, false)){
            cacheRegenerate($scriptProperties);
        }
        break;
}