<?php /* Smarty version 3.1.27, created on 2018-01-28 17:17:14
         compiled from "/home/lexus/server/modx-revo-assembly.tool/manager/templates/default/welcome.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1041849755a6ddb6a50c3a9_32620810%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32e234d89d2c1a5a13b1ab42d2a727baa36b80ca' => 
    array (
      0 => '/home/lexus/server/modx-revo-assembly.tool/manager/templates/default/welcome.tpl',
      1 => 1513251612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1041849755a6ddb6a50c3a9_32620810',
  'variables' => 
  array (
    'dashboard' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a6ddb6a5338c2_05331454',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a6ddb6a5338c2_05331454')) {
function content_5a6ddb6a5338c2_05331454 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1041849755a6ddb6a50c3a9_32620810';
?>
<div id="modx-panel-welcome-div"></div>

<div id="modx-dashboard" class="dashboard">
<?php echo $_smarty_tpl->tpl_vars['dashboard']->value;?>

</div><?php }
}
?>