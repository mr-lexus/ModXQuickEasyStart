<?php /* Smarty version 3.1.27, created on 2018-01-14 21:55:43
         compiled from "/home/lexus/server/modx-revo-assembly.tool/manager/templates/default/browser/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:19991145205a5ba7af5b6834_30641586%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f891b20773d31ff53922012235fdd872a093d87d' => 
    array (
      0 => '/home/lexus/server/modx-revo-assembly.tool/manager/templates/default/browser/index.tpl',
      1 => 1513251612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19991145205a5ba7af5b6834_30641586',
  'variables' => 
  array (
    '_config' => 0,
    '_lang' => 0,
    '_ctx' => 0,
    'maincssjs' => 0,
    'cssjs' => 0,
    'scr' => 0,
    'rteincludes' => 0,
    'rtecallback' => 0,
    'site_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a5ba7af63cb23_22273957',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a5ba7af63cb23_22273957')) {
function content_5a5ba7af63cb23_22273957 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '19991145205a5ba7af5b6834_30641586';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php if ($_smarty_tpl->tpl_vars['_config']->value['manager_direction'] == 'rtl') {?>dir="rtl"<?php }?> lang="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_lang_attribute'];?>
" xml:lang="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_lang_attribute'];?>
">
<head>
<title>MODX :: <?php echo $_smarty_tpl->tpl_vars['_lang']->value['modx_resource_browser'];?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['_config']->value['modx_charset'];?>
" />


<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/resources/css/ext-all-notheme-min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
templates/default/css/index<?php if ($_smarty_tpl->tpl_vars['_config']->value['compress_css']) {?>-min<?php }?>.css" />

<?php if (isset($_smarty_tpl->tpl_vars['_config']->value['ext_debug']) && $_smarty_tpl->tpl_vars['_config']->value['ext_debug']) {?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/adapter/ext/ext-base-debug.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/ext-all-debug.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php } else { ?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/adapter/ext/ext-base.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/ext-all.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php }?>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/modext/core/modx.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['connectors_url'];?>
lang.js.php?ctx=mgr&topic=category,file,resource&action=<?php echo (($tmp = @preg_replace('!<[^>]*?>!', ' ', $_GET['a']))===null||$tmp==='' ? '' : $tmp);?>
" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['connectors_url'];?>
modx.config.js.php?action=<?php echo (($tmp = @preg_replace('!<[^>]*?>!', ' ', $_GET['a']))===null||$tmp==='' ? '' : $tmp);
if ($_smarty_tpl->tpl_vars['_ctx']->value) {?>&wctx=<?php echo $_smarty_tpl->tpl_vars['_ctx']->value;
}?>" type="text/javascript"><?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->tpl_vars['maincssjs']->value;?>


<?php
$_from = $_smarty_tpl->tpl_vars['cssjs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['scr'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['scr']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['scr']->value) {
$_smarty_tpl->tpl_vars['scr']->_loop = true;
$foreach_scr_Sav = $_smarty_tpl->tpl_vars['scr'];
?>
<?php echo $_smarty_tpl->tpl_vars['scr']->value;?>

<?php
$_smarty_tpl->tpl_vars['scr'] = $foreach_scr_Sav;
}
?>

<?php echo $_smarty_tpl->tpl_vars['rteincludes']->value;?>

</head>
<body>


<?php echo '<script'; ?>
 type="text/javascript">
Ext.onReady(function() {
    Ext.QuickTips.init();
    Ext.BLANK_IMAGE_URL = MODx.config.manager_url+'assets/ext3/resources/images/default/s.gif';
    <?php if ($_smarty_tpl->tpl_vars['rtecallback']->value) {?>
    MODx.onBrowserReturn = <?php echo $_smarty_tpl->tpl_vars['rtecallback']->value;?>
;<?php }?>
    MODx.ctx = "<?php if ($_smarty_tpl->tpl_vars['_ctx']->value) {
echo $_smarty_tpl->tpl_vars['_ctx']->value;
} else { ?>web<?php }?>";
    MODx.load({
       xtype: 'modx-browser-rte'
       ,auth: '<?php echo $_smarty_tpl->tpl_vars['site_id']->value;?>
'
    });
});
<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
?>