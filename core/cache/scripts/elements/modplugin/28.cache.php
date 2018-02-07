<?php  return 'if($modx->context->key != "mgr" 
	&& $modx->getOption(\'friendly_urls\') == true
	&& substr($_SERVER[\'REQUEST_URI\'], -1) == $modx->getOption(\'container_suffix\')
	&& $modx->resource->get(\'publishedby\') == 1
	&& $modx->resource->get(\'isfolder\') == 1
	&& $modx->resource->get(\'class_key\') == "modDocument") {
	redirect(substr($_SERVER[\'REQUEST_URI\'],0,-1));
}
return;
';