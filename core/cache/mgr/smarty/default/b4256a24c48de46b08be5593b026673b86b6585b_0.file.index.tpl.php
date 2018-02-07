<?php /* Smarty version 3.1.27, created on 2018-01-28 23:12:14
         compiled from "/home/lexus/server/modx-revo-assembly.tool/manager/templates/default/workspaces/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:5304408575a6e2e9e7c84e2_61539556%%*/
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
  'nocache_hash' => '5304408575a6e2e9e7c84e2_61539556',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a6e2e9e7d1e17_61811246',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a6e2e9e7d1e17_61811246')) {
function content_5a6e2e9e7d1e17_61811246 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '5304408575a6e2e9e7c84e2_61539556';
echo (($tmp = @$_smarty_tpl->tpl_vars['error']->value)===null||$tmp==='' ? '' : $tmp);?>

<div id="modx-panel-workspace-div"></div>
<?php }
}
?>