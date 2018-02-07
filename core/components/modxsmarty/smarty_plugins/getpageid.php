<?php
/**
 * Smarty plugin
 *
 * @package Smarty
 * @subpackage PluginsFunction
 */


function smarty_function_getpageid($params, & $smarty)
{
    if(empty($_REQUEST['page'])){
        return 0;
    } else {
        return $_REQUEST['page'];
    }
}


?>