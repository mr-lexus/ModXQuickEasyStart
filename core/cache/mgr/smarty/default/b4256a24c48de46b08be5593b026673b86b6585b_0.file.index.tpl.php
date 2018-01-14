<?php /* Smarty version 3.1.27, created on 2018-01-14 21:36:18
         compiled from "/home/lexus/server/modx-revo-assembly.tool/manager/templates/default/workspaces/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:817159715a5ba32265b689_16811040%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4256a24c48de46b08be5593b026673b86b6585b' => 
    array (
      0 => '/home/lexus/server/modx-revo-assembly.tool/manager/templates/default/workspaces/index.tpl',
      1 => 1513251612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '817159715a5ba32265b689_16811040',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a5ba322662620_85730238',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a5ba322662620_85730238')) {
function content_5a5ba322662620_85730238 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '817159715a5ba32265b689_16811040';
echo (($tmp = @$_smarty_tpl->tpl_vars['error']->value)===null||$tmp==='' ? '' : $tmp);?>

<div id="modx-panel-workspace-div"></div>
<?php }
}
?>