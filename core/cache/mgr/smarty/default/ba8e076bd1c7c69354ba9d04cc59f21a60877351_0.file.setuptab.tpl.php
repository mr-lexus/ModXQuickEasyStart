<?php /* Smarty version 3.1.27, created on 2018-01-28 23:54:30
         compiled from "/home/lexus/server/modx-revo-assembly.tool/core/components/migx/templates/mgr/setuptab.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:519228835a6e3886568bf8_23789324%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba8e076bd1c7c69354ba9d04cc59f21a60877351' => 
    array (
      0 => '/home/lexus/server/modx-revo-assembly.tool/core/components/migx/templates/mgr/setuptab.tpl',
      1 => 1515854205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '519228835a6e3886568bf8_23789324',
  'variables' => 
  array (
    'cmptabcaption' => 0,
    'cmptabdescription' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a6e388656bf69_72052868',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a6e388656bf69_72052868')) {
function content_5a6e388656bf69_72052868 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '519228835a6e3886568bf8_23789324';
?>
 
{
    title: '<?php echo $_smarty_tpl->tpl_vars['cmptabcaption']->value;?>
',
    defaults: {
        autoHeight: true
    },
    items: [{
        html: '<p><?php echo $_smarty_tpl->tpl_vars['cmptabdescription']->value;?>
</p>',
        border: false,
        bodyCssClass: 'panel-desc'
    },
    {
        xtype: 'form',
        id: 'migx_setup_form',
        standardSubmit: true,
        url: config.src,
        items: [{
            xtype: 'modx-tabs',
            id: 'migx-tab-setup',
            defaults: {
                border: false,
                autoHeight: true
            },
            border: true,
            items: [{
                title: 'Setup',
                defaults: {
                    autoHeight: true
                },
                items: [{
                    html: '<p>Setup MIGX-Configurator. (Creates/upgrades Configurations-table)</p>'
                         +'<p>Make allways backups before upgrading!</p>',
                    bodyCssClass: 'panel-desc',
                    border: false
                },
                {
                    xtype: 'button',
                    handler: function(){this.setupmigx('setupmigx')},
                    text: 'Setup',
                    scope: this
                }]
            },{
                title: 'Upgrade MIGX',
                layout:'form',
                defaults: {
                    autoHeight: true
                },
                items: [{
                    html: '<p>Adds the autoinc-field MIGX_id to all existing MIGX-TVs from older Versions</p>'
                    +'<p>Make allways backups before upgrading!</p>',
                    bodyCssClass: 'panel-desc',
                    border: false
                },
                {
                    xtype: 'button',
                    handler: function(){this.setupmigx('upgrademigx')},
                    text: 'Upgrade',
                    scope: this
                }]
            }]
        }]
    }]
}





<?php }
}
?>