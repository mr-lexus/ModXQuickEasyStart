<?php /* Smarty version 3.1.27, created on 2018-01-28 23:54:30
         compiled from "/home/lexus/server/modx-revo-assembly.tool/core/components/migx/templates/mgr/grids/default.grid.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9712405a6e388649f5d5_69320376%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acd6dd78c8cfc1a78eab61cd51e06002bb3013fd' => 
    array (
      0 => '/home/lexus/server/modx-revo-assembly.tool/core/components/migx/templates/mgr/grids/default.grid.tpl',
      1 => 1515854205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9712405a6e388649f5d5_69320376',
  'variables' => 
  array (
    'win_id' => 0,
    'customconfigs' => 0,
    'reqTempParams' => 0,
    'reqConfigs' => 0,
    'filterDefaults' => 0,
    'resource' => 0,
    'connected_object_id' => 0,
    'properties' => 0,
    'tv_id' => 0,
    'tv' => 0,
    'myctx' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5a6e38864d29e3_56865839',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5a6e38864d29e3_56865839')) {
function content_5a6e38864d29e3_56865839 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9712405a6e388649f5d5_69320376';
?>


MODx.grid.multiTVdbgrid<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
 = function(config) {
    config = config || {};
	//console.log(config);
    this.sm = new Ext.grid.CheckboxSelectionModel();

    // define grid columns in a separate variable
    var cols=[this.sm];
    // add empty pathconfig (source) to array to match number of col in renderimage
    var pc=[''];
    var renderer = null;
    var pageSize = '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['customconfigs']->value['gridpagesize'])===null||$tmp==='' ? '' : $tmp);?>
';
    if (pageSize != ''){
        config.pageSize=parseInt(pageSize); 
    }
   
	for(i = 0; i <  config.columns.length; i++) {
        renderer = config.columns[i]['renderer'];
        if (typeof renderer != 'undefined'){
            config.columns[i]['renderer'] = {fn:eval(renderer),scope:this};
        }
        editor = config.columns[i]['editor'];
        if (typeof editor != 'undefined'){
            editor = editor.replace('this.','');
            if (this[editor]){
                config.columns[i]['editor'] = this[editor](config.columns[i]);
            }
        }         
        cols.push(config.columns[i]);
        pc.push(config.pathconfigs[i]);
    }
    config.pathconfigs = pc; 
    config.columns=cols;    
    Ext.applyIf(config,{
	autoHeight: true,
    collapsible: true,
	resizable: true,
    loadMask: true,
    paging: true,
    pageSize: 10,
    autosave: false,
    remoteSort: true,
    primaryKey: 'id',
    isModified : false,    
    sm: this.sm,
	viewConfig: {
        emptyText: 'No items found',
        forceFit: true,
		autoFill: true
    },
    url : config.url,
    baseParams: { 
        action: 'mgr/migxdb/getList',
        configs: config.configs,
        reqTempParams:'<?php echo $_smarty_tpl->tpl_vars['reqTempParams']->value;?>
',
        reqConfigs:'<?php echo $_smarty_tpl->tpl_vars['reqConfigs']->value;?>
', 
        resource_id: config.resource_id,
        object_id: config.object_id,
        'HTTP_MODAUTH': config.auth
    },
    fields: [],    
    columns: [], // define grid columns in a separate variable
    tbar: [<?php echo $_smarty_tpl->tpl_vars['customconfigs']->value['tbar'];?>
]        
    });
	
    MODx.grid.multiTVdbgrid<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
.superclass.constructor.call(this,config)
    this._makeTemplates();
    this.setDefaultFilters();
    this.getStore().pathconfigs=config.pathconfigs;
    this.on('click', this.onClick, this);   

};
Ext.extend(MODx.grid.multiTVdbgrid<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
,MODx.grid.Grid,{
    _renderUrl: function(v,md,rec) {
        return '<a href="'+v+'" target="_blank">'+rec.data.pagetitle+'</a>';
    }
    ,_makeTemplates: function() {
        this.tplRowActions = new Ext.XTemplate('<tpl for="."><div class="migx-actions-column">'
										    +'<h3 class="main-column">{column_value}</h3>'
												+'<tpl if="column_actions">'
													+'<ul class="actions">'
                                                        +'<tpl for="column_actions">'
                                                            +'<tpl if="typeof (className) != '+"'undefined'"+'">'   
														    +'<li><a href="#" class="controlBtn {className} {handler}">{text}</a></li>'
                                                          +'</tpl>'
													    +'</tpl>'
                                                    +'</ul>'
												+'</tpl>'
											+'</div></tpl>',{
			compiled: true
		});
    }
    ,setDefaultFilters: function(){
        var filterDefaults = Ext.util.JSON.decode('<?php echo $_smarty_tpl->tpl_vars['filterDefaults']->value;?>
');
        var input = null;
        var refresh = false;
        var value = '';
        for (var i=0;i<filterDefaults.length;i++) {
            input = Ext.getCmp(filterDefaults[i].name+'-migxdb-search-filter');
            value = filterDefaults[i].default;
            if (input && value != ''){
                if (value == '_empty'){
                    value = '';
                }                
                input.setValue(value);
                this.getStore().baseParams[filterDefaults[i].name]=value;
                refresh = true;
            } 
        }
        if (refresh){
            this.getBottomToolbar().changePage(1);
            this.refresh();            
        }            
                   
    }
    ,getSelectedAsList: function() {
        var sels = this.getSelectionModel().getSelections();
        if (sels.length <= 0) return false;

        var cs = '';
        for (var i=0;i<sels.length;i++) {
            cs += ','+sels[i].data.id;
        }
        cs = Ext.util.Format.substr(cs,1,cs.length-1);
        return cs;
    }
    
    <?php echo $_smarty_tpl->tpl_vars['customconfigs']->value['gridfunctions'];?>


    ,setWinPosition: function(x,y){
    var win = Ext.getCmp('modx-window-mi-grid-update-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
');
    win.setPosition(x,y);     
        
    }	
                	     
	,loadWin: function(btn,e,action,tempParams) {
        
        var storeParams = Ext.util.JSON.encode(this.store.baseParams); 
        var resource_id = '<?php echo $_smarty_tpl->tpl_vars['resource']->value['id'];?>
';
        var tempParams = tempParams || null;
        var input_prefix = Ext.id(null,'inp_');
        var co_id = '<?php echo $_smarty_tpl->tpl_vars['connected_object_id']->value;?>
';
        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['properties']->value['autoResourceFolders'])===null||$tmp==='' ? '' : $tmp) == 'true') {?>
        if (resource_id == 0){
            alert (_('migx.save_resource'));
            return;
        }
        <?php }?>        
       
        if (action == 'a'){
           var object_id = 'new';
        }else{
           var object_id = this.menu.record.id;
           //var object_id = 3;
        }
        
        var isnew = (action == 'u') ? '0':'1';
        var isduplicate = (action == 'd') ? '1':'0';
        var win_xtype = 'modx-window-tv-dbitem-update-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
';
		this.windows[win_xtype] = null;
        /*
        if (this.windows[win_xtype]){
			this.windows[win_xtype].fp.autoLoad.params.tv_id='<?php echo $_smarty_tpl->tpl_vars['tv_id']->value;?>
';
			this.windows[win_xtype].fp.autoLoad.params.resource_id=resource_id;
            this.windows[win_xtype].fp.autoLoad.params.co_id=co_id;
            this.windows[win_xtype].fp.autoLoad.params.input_prefix=input_prefix;
            this.windows[win_xtype].fp.autoLoad.params.configs=this.config.configs;
            this.windows[win_xtype].fp.autoLoad.params.tv_name='<?php echo $_smarty_tpl->tpl_vars['tv']->value->name;?>
';
            this.windows[win_xtype].fp.autoLoad.params.object_id=object_id;
            this.windows[win_xtype].fp.autoLoad.params.tempParams=tempParams;
            this.windows[win_xtype].fp.autoLoad.params.storeParams=storeParams;
            this.windows[win_xtype].fp.autoLoad.params.loadaction='';
            this.windows[win_xtype].fp.autoLoad.params.isnew=isnew;
            this.windows[win_xtype].fp.autoLoad.params.isduplicate=isduplicate;            
			this.windows[win_xtype].grid=this;
            this.windows[win_xtype].action=action;
            
            //this.setWinPosition(10,10);
            
    	}
        */
        /*
        if (this.windows[win_xtype]){
             //this.windows[win_xtype].destroy();
             //console.log(this.windows[win_xtype]);
             delete this.windows[win_xtype]; 
        }
        */
        
        //console.log('loadwin');
        
		this.loadWindow(btn,e,{
            xtype: win_xtype
			,grid: this
            ,action: action
            ,baseParams : {
			    action: 'mgr/migxdb/fields',
                win_id: '<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
',
				tv_id: '<?php echo $_smarty_tpl->tpl_vars['tv_id']->value;?>
',
				tv_name: '<?php echo $_smarty_tpl->tpl_vars['tv']->value->name;?>
',
				'class_key': 'modDocument',
                'wctx':'<?php echo $_smarty_tpl->tpl_vars['myctx']->value;?>
',
                object_id: object_id,
                configs: this.config.configs,
                resource_id : resource_id,
                co_id : co_id,
                isnew : isnew,
                isduplicate : isduplicate,                
                tempParams: tempParams,
                storeParams: storeParams,
                input_prefix: input_prefix,
                loadaction:''
			}
        });
    }
	,loadIframeWin: function(btn,e,tpl,action) {
        var resource_id = '<?php echo $_smarty_tpl->tpl_vars['resource']->value['id'];?>
';
        var co_id = '<?php echo $_smarty_tpl->tpl_vars['connected_object_id']->value;?>
';
        var url = '<?php echo $_smarty_tpl->tpl_vars['config']->value['connectorUrl'];?>
';
        var tv = Ext.get('tv<?php echo $_smarty_tpl->tpl_vars['tv_id']->value;?>
');
        var items = tv ? tv.dom.value : '';
        var jsonvarkey = '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['properties']->value['jsonvarkey'])===null||$tmp==='' ? '' : $tmp);?>
';
        var action = action||'a';
        var storeParams = Ext.util.JSON.encode(this.store.baseParams);
        //console.log(co_id);
        if (action == 'a'){
           var object_id = 'new';
        }else{
           var object_id = this.menu.record.id;
        }        
        if (jsonvarkey == ''){
            jsonvarkey = 'migx_outputvalue';
        }
        var object_id_field = null;
        
        var win_xtype = 'modx-window-mi-iframe-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
';
		if (this.windows[win_xtype]){
			//this.windows[win_xtype].fp.autoLoad.params.tv_id='<?php echo $_smarty_tpl->tpl_vars['tv_id']->value;?>
';
			//this.windows[win_xtype].fp.autoLoad.params.tv_name='<?php echo $_smarty_tpl->tpl_vars['tv']->value->name;?>
';
		    //this.windows[win_xtype].fp.autoLoad.params.itemid=index;
            //this.windows[win_xtype].fp.autoLoad.params.record_json=json;
            this.windows[win_xtype].object_id = object_id;
            this.windows[win_xtype].src = url;
			this.windows[win_xtype].json=items;
            this.windows[win_xtype].jsonvarkey=jsonvarkey;
            this.windows[win_xtype].action=action;
            this.windows[win_xtype].resource_id=resource_id;
            this.windows[win_xtype].co_id=co_id;
            this.windows[win_xtype].grid=this;
            object_id_field = Ext.get('migx_iframewin_object_id_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
');
            object_id_field.dom.value = object_id;
            iframeTpl_field = Ext.get('migx_iframewin_iframeTpl_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
');
            iframeTpl_field.dom.value = tpl;
            co_id_field = Ext.get('migx_iframewin_co_id_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
');
            co_id_field.dom.value = co_id;
            store_params_field = Ext.get('migx_iframewin_store_params_<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
');
            store_params_field.dom.value = storeParams;            
		}
		this.loadWindow(btn,e,{
            xtype: win_xtype
            ,src: url
            ,jsonvarkey:jsonvarkey
            ,json: items
			,grid: this
            ,action: action
            ,object_id: object_id
            ,resource_id: resource_id
            ,co_id: co_id
            ,storeParams : storeParams
            ,title: '<?php echo (($tmp = @$_smarty_tpl->tpl_vars['customconfigs']->value['iframeWindowTitle'])===null||$tmp==='' ? '' : $tmp);?>
'
            ,iframeTpl: tpl
        });
    }    		        
    ,getMenu: function() {
		var n = this.menu.record;
        var m = [];
        <?php echo $_smarty_tpl->tpl_vars['customconfigs']->value['gridcontextmenus'];?>
        	        
		return m;
    }
    ,renderRowActions:function(v,md,rec) {
        var n = rec.data;
        var m = [];	   
        <?php echo $_smarty_tpl->tpl_vars['customconfigs']->value['gridcolumnbuttons'];?>
 
        rec.data.column_actions = m;
        rec.data.column_value = v;
        return this.tplRowActions.apply(rec.data);
	}    
    ,setSelectedRecords:function(){
        this.selected_records = this.getSelectionModel().getSelections();    
    }        
	,updateSelected: function(column,value,stopRefresh){
        var col = null;	 
        var rec = null;        
        if (column && column.dataIndex){
            col = column.dataIndex;
 		    var records = this.selected_records;
            if (records){
                for(i = 0; i < records.length; i++) {
                    rec = records[i];
                    var object_id = rec.id;
                    var item = {};
                    item[col] = value;
                    MODx.Ajax.request({
                        url: this.url
                        ,params: {
                            action: 'mgr/migxdb/update'
                            ,data: Ext.util.JSON.encode(item)
				            ,configs: this.configs
                            ,resource_id: this.resource_id
                            ,co_id: this.co_id
                            ,object_id: object_id
                            ,tv_id: this.baseParams.tv_id
                            ,wctx: this.baseParams.wctx
                        }
                        ,listeners: {
                            'success': {
                                fn:function(){
                                    this.refresh();
                                }
                                ,scope:this} 
                        }
                    });
                 }
             }
         }
         if (stopRefresh){
            
         }else{
                  
         }

         MODx.fireResourceFormChange();   
	} 
	,onClick: function(e){
        var t = e.getTarget();
        var elm = t.className.split(' ')[0];
		if(elm == 'controlBtn') {
            var handler = t.className.split(' ')[2];
            var col = t.className.split(' ')[3];
			var record = this.getSelectionModel().getSelected();
            this.menu.record = record;
            var fn = eval(handler);
            fn = fn.createDelegate(this);
            fn(null,e,col);
            e.stopEvent();
 		}
	} 
  
});
Ext.reg('modx-grid-multitvdbgrid-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
',MODx.grid.multiTVdbgrid<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
);

MODx.MigxTreeCombo = function(config) {
    config = config || {};
    Ext.applyIf(config,{

      
    });
    MODx.MigxTreeCombo.superclass.constructor.call(this,config);
    this.options = config;
    this.config = config;

    //this.on('show',this.onShow,this);
    this.addEvents({
        success: true
        ,failure: true
		//,hide:true
		//,show:true
    });
    //this.renderIframe();	
};

Ext.extend(MODx.MigxTreeCombo,Ext.form.ComboBox,{
    extStore: null,
    tree: null,
    treeId: 0,
    
       initComponent: function() {
            this.treeId = Ext.id();
            this.focusLinkId = Ext.id();
            Ext.apply(this, {
                store: new Ext.data.SimpleStore({
                    fields: [],
                    data: [[]]
                }),
                editable: false,
                shadow: false,
                mode: 'local',
                triggerAction: 'all',
                maxHeight: 200,
                tpl: '<tpl for="."><div style="height:200px"><div id="' + this.treeId + '"></tpl>',
                selectedClass: '',
                onSelect: Ext.emptyFn,
                valueField: 'id',
            });
            var baseParams = this.baseParams;
            var root = this.root;
            var listeners = this.treelisteners;
            this.tree = new Ext.tree.TreePanel({
			    loader: new Ext.tree.TreeLoader({
			        dataUrl: '<?php echo $_smarty_tpl->tpl_vars['config']->value['connectorUrl'];?>
',
                    baseParams: baseParams
			    }),
                root: root,
			    autoHeight: true
		    });

            this.on('expand', this.onExpand);
            this.tree.on('beforeclick', this.onNodeclick, this);
            this.tree.on('expandnode', this.onBeforeexpandnode, this);
            this.tree.on('collapsenode', this.onBeforecollapsenode, this);
            MODx.MigxTreeCombo.superclass.initComponent.apply(this, arguments);
    },        


    onExpand: function() {

        this.tree.render(this.treeId);        
        this.tree.getRootNode().expand();
    },

    onBeforeexpandnode: function(node) {
        //expand combobox again, if expand-icon was clicked
        this.expand();
    },
    onBeforecollapsenode: function(node) {
        //expand combobox again, if collapse-icon was clicked
        this.expand();
    },               
    onNodeclick: function(node,e) {
        //this.setValue(node.text);
        this.setValue(node.id);
        this.el.dom.value = node.text;
        this.hiddenField.value = node.id;
        this.fireEvent('nodeclick', this, node.id, this.startValue);
        //this.setValue(node.text);
        //this.collapse();
        //return false;
    }
});
Ext.reg('migx-treecombo', MODx.MigxTreeCombo);

var MIGx = MIGx || {};
 
MIGx.updateGrid = function() {
    /*
    var grids = this.el.select('.tv_modx-grid-multitvgrid_items');
    grids.each(function(grid){
        Ext.getCmp(grid.id).getView().refresh();
    });
    */  
};
 
Ext.ComponentMgr.onAvailable('modx-grid-multitvdbgrid-<?php echo $_smarty_tpl->tpl_vars['win_id']->value;?>
', function() {
    /*
    if (this.configs == 'memsnippets'){
        console.log(this);
        this.menu = this.menu || new Ext.menu.Menu(this.config.menuConfig);;
        this.menu.record = this.menu.record || {};
        this.menu.record.id = 3;
        this.loadWin(null,'u');
    }
    */
    /*
    Ext.apply(this, {
        listeners: {
            tabchange: MIGx.updateGrid,
            afterlayout: MIGx.updateGrid,
            resize: MIGx.updateGrid
        }
    });
    */
     
});




<?php }
}
?>