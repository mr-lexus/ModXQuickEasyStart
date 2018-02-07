<?php /* Smarty version 3.1.27, created on 2018-01-28 23:54:30
         compiled from "/home/lexus/server/modx-revo-assembly.tool/core/components/migx/templates/mgr/gridpanel.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:20130655335a6e3886570db4_05715001%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec633ca5889ec1abbf1547e2e373c936d63c7927' => 
    array (
      0 => '/home/lexus/server/modx-revo-assembly.tool/core/components/migx/templates/mgr/gridpanel.tpl',
      1 => 1515854205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20130655335a6e3886570db4_05715001',
  'variables' => 
  array (
    'maincaption' => 0,
    'cmptabs' => 0,
    'customHandlers' => 0,
    'grids' => 0,
    'updatewindows' => 0,
    'iframewindows' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a6e3886577241_68038885',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a6e3886577241_68038885')) {
function content_5a6e3886577241_68038885 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '20130655335a6e3886570db4_05715001';
?>


Migx.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        formpanel: 'modx-panel-resource'
        ,components: [{
            xtype: 'modx-panel-resource'
            ,object_id: config.object_id
			,configs: config.configs
	        ,url: Migx.config.connector_url
        },{
            xtype: 'migx-panel-home'
            ,renderTo: 'migx-panel-home-div'
        }]
    });
    Migx.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(Migx.page.Home,MODx.Component);
Ext.reg('migx-page-home',Migx.page.Home);


Migx.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+<?php echo $_smarty_tpl->tpl_vars['maincaption']->value;?>
+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,items: [
            <?php echo $_smarty_tpl->tpl_vars['cmptabs']->value;?>

            ]
        }]
    });
    Migx.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Migx.panel.Home,MODx.Panel,{<?php echo $_smarty_tpl->tpl_vars['customHandlers']->value;?>
});
Ext.reg('migx-panel-home',Migx.panel.Home);


<?php echo $_smarty_tpl->tpl_vars['grids']->value;?>

<?php echo $_smarty_tpl->tpl_vars['updatewindows']->value;?>

<?php echo $_smarty_tpl->tpl_vars['iframewindows']->value;?>



Migx.panel.Object = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'modx-panel-resource'
	    ,cls: 'container'
        ,url: config.url
        ,defaults: {
        	   collapsible: false 
                   ,autoHeight: true
        }
        ,baseParams: {configs: config.configs}		
        //,autoLoad: this.autoload(config)
        ,listeners: {
            'beforeSubmit': {fn:this.beforeSubmit,scope:this}
            ,'success': {fn:this.success,scope:this}
			,'load': {fn:this.load,scope:this}
        }		
    });
    Migx.panel.Object.superclass.constructor.call(this,config);
	//this.addEvents({ load: true });
};
Ext.extend(Migx.panel.Object,MODx.FormPanel,{
    autoload: function(config) {
		var a = {
            //url: MODx.config.manager_url+'index.php?a='+MODx.action['resource/tvs']
            url: config.url
			,method: 'GET'
            ,params: {
               //'a': MODx.action['resource/tvs']
                action: 'mgr/xdbedit/fields'
                ,object_id: config.object_id
				,configs: config.configs			   
               ,'class_key': 'modDocument'//config.class_key
            }
            ,scripts: true
            ,callback: function() {
                this.fireEvent('load');
                MODx.fireEvent('ready');
            }
            ,scope: this
        };
        return a;        	
    }
    
    ,
    setup: function() {

    }
    ,beforeSubmit: function(o) {
        if (typeof(tinyMCE) != 'undefined') {        
            tinyMCE.triggerSave();
        }     
    }
    ,success: function(o) {
        if (o.result.message != ''){
            Ext.Msg.alert(_('warning'), o.result.message);
        }
        this.doAutoLoad();
		var gf = Ext.getCmp('xdbedit-grid-objects');
		gf.isModified = true;
		gf.refresh();
     },
	 load: function() {
        //console.log('test');
		//MODx.loadRTE();
        if (typeof(Tiny) != 'undefined') {
		    var s={};
            if (Tiny.config){
                s = Tiny.config || {};
                delete s.assets_path;
                delete s.assets_url;
                delete s.core_path;
                delete s.css_path;
                delete s.editor;
                delete s.id;
                delete s.mode;
                delete s.path;
                s.cleanup_callback = "Tiny.onCleanup";
                var z = Ext.state.Manager.get(MODx.siteId + '-tiny');
                if (z !== false) {
                    delete s.elements;
                }			
		    }
			s.mode = "specific_textareas";
            s.editor_selector = "modx-richtext";
		    //s.language = "en";// de seems not to work at the moment
            tinyMCE.init(s);				
		}        
	  
	 }
		
    
});
Ext.reg('modx-panel-resource',Migx.panel.Object);

MODx.fireResourceFormChange = function(f,nv,ov) {
    //Ext.getCmp('modx-panel-resource').fireEvent('fieldChange');
};

<?php }
}
?>