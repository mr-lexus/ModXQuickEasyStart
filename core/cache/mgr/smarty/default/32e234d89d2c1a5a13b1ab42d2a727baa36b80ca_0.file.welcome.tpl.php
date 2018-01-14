<?php /* Smarty version 3.1.27, created on 2018-01-14 22:41:55
         compiled from "/home/lexus/server/modx-revo-assembly.tool/manager/templates/default/welcome.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16526789185a5bb283e745b8_16490225%%*/
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
  'nocache_hash' => '16526789185a5bb283e745b8_16490225',
  'variables' => 
  array (
    'dashboard' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a5bb283e76b60_43088555',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a5bb283e76b60_43088555')) {
function content_5a5bb283e76b60_43088555 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '16526789185a5bb283e745b8_16490225';
?>
<div id="modx-panel-welcome-div"></div>

<div id="modx-dashboard" class="dashboard">
<?php echo $_smarty_tpl->tpl_vars['dashboard']->value;?>

</div><?php }
}
?>