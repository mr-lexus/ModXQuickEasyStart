ComposerConsole.panel.Home = function(config) {
    config = config || {};

    this.commands = Ext.state.Manager.get('commands') || [];
    this.current_comand = 0;

    this.resultPanel = new Ext.Panel({
        id: 'composer-console-result'
        , html: 'Enter: list'
        , style: {
            margin: '5px',
            marginTop: '0'
        }
        , bodyStyle: {
            padding: '10px 15px'
            ,border: 'lightgrey solid 1px'
            ,backgroundColor: '#F5F5F5'
            ,fontFamily: 'monospace'
            ,wordWrap: 'break-word'
        }
        ,listeners:{
            "afterrender": {
                fn: function(el){
                    var upd = el.getUpdater();
                    upd.on('beforeupdate',function(a, b){
                        if (upd.showLoadIndicator !== false) {
                            this.resultPanel.update('...');
                        }
                    }, this);
                    upd.on('update',function(result, response){
                        var res = JSON.parse(response.responseText);
                        this.resultPanel.update('<pre>'+res.output+'</pre>');
                        upd.showLoadIndicator = true;
                    }, this);
                    upd.update({
                        url: ComposerConsole.config.connector_url,
                        params:{
                            action: 'command'
                        }
                    });
                }
            }
            ,scope: this
        }
    });

    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('composerconsole')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        }, {
            xtype: 'modx-tabs'
            , border: true
            , activeItem: 0
            , items: [{
                title: _('composerconsole.tab_console')
                , layout: 'anchor'
                , items: [{
                    html: '<p>' + _('composerconsole.console_intro_msg') + '</p>'
                    , border: false
                    , bodyCssClass: 'panel-desc'
                },{
                    layout:'anchor'
                    , items: [{
                        xtype: 'textfield'
                        , id: 'composer-console-command'
                        , hideLabel: true
                        , style: {
                            margin: '5px'
                        }
                        , anchor: '80%'
                        , enableKeyEvents: true
                        ,listeners: {
                            keydown: function(cmd, e){
                                if (e && e.keyCode == e.ENTER) {
                                    this.runCommand(cmd);
                                } else if(e.keyCode == e.UP) {
                                    this.getPrevCommand(cmd);
                                } else if(e.keyCode == e.DOWN) {
                                    this.getNextCommand(cmd);
                                }

                            }
                            ,scope: this
                        }
                    },{
                        xtype: 'button'
                        , text: _('composerconsole.run_button')
                        , style: {
                            margin: '5px'
                            ,lineHeight: 'normal'
                            ,padding: '6px 0px'
                            ,verticalAlign: 'top'
                        }
                        , anchor: '20%'
                        ,listeners: {
                            click: function() {
                                this.runCommand();
                            }
                            ,scope: this
                        }
                    }]
                }
                    ,this.resultPanel
                ]
            }, {
                title: _('composerconsole.tab_composerjson')
                , listeners: {
                    show: function() {
                        this.getComposerJson();
                    }
                    ,scope: this
                }
                , items: [{
                    html: '<p>' + _('composerconsole.composerjson_intro_msg') + '</p>'
                    , border: false
                    , bodyCssClass: 'panel-desc'
                },{
                    id: 'content-composer-json'
                    ,xtype: Ext.ComponentMgr.types['modx-texteditor'] ? 'modx-texteditor' : 'textarea'
                    ,mimeType: 'application/json'
                    ,height: 300
                    ,width: 'auto'
                    ,style: {
                        margin: '5px'
                    }
                    ,enableKeyEvents: true
                    ,listeners: {
                        keydown: function(editor, e){
                            if (e && e.ctrlKey && e.keyCode == e.ENTER) {
                                this.saveComposerJson();
                            }
                        }
                        ,focus: function() {
                            console.log('show');
                        }
                        ,scope: this
                    }
                    ,value: this.getComposerJson()
                },{
                    style: {
                        margin: '5px'
                        ,textAlign: 'right'
                    }
                    , defaults: {
                        style: {marginLeft: '10px'}
                    }
                    ,items:[{
                        xtype: 'button'
                        , cls: 'primary-button'
                        , text: _('composerconsole.save_json_button')
                        , listeners: {
                            click: function() {
                                this.saveComposerJson();
                            }
                            ,scope: this
                        }
                    }]
                }]
            }]
        }]
    });
    ComposerConsole.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(ComposerConsole.panel.Home,MODx.Panel,{
    runCommand: function (cmdfield) {
        var cmdfield = cmdfield || Ext.getCmp('composer-console-command');
        this.saveCommands(cmdfield);
        if(cmdfield && cmdfield.getValue()) {
            var upd = this.resultPanel.getUpdater();
            upd.update({
                url: ComposerConsole.config.connector_url,
                params:{
                    action: 'command',
                    command: cmdfield.getValue()
                }
            });
            cmdfield.setValue('');
        }
    }
    ,saveCommands: function (cmdfield) {
        var cmdfield = cmdfield || Ext.getCmp('composer-console-command');
        if(this.commands.length > 20) this.commands.shift();
        this.current_comand = this.commands.length-1;
        if(this.commands[this.commands.length-1] != cmdfield.getValue()) {
            this.commands.push(cmdfield.getValue());
            Ext.state.Manager.set('commands',this.commands);
        }
    }
    ,getPrevCommand: function (cmdfield) {
        var cmdfield = cmdfield || Ext.getCmp('composer-console-command');
        this.current_comand--;
        if(this.current_comand < 0) this.current_comand = 0;
        var cmd = this.commands[this.current_comand] || '';
        cmdfield.setValue(cmd);
    }
    ,getNextCommand: function (cmdfield) {
        var cmdfield = cmdfield || Ext.getCmp('composer-console-command');
        this.current_comand++;
        if(this.current_comand > this.commands.length) this.current_comand = this.commands.length;
        var cmd = this.commands[this.current_comand] || '';
        cmdfield.setValue(cmd);
    }
    ,saveComposerJson: function () {
        var el = Ext.getCmp('content-composer-json');
        MODx.Ajax.request({
            url: ComposerConsole.config.connector_url,
            params: {
                action: 'savefile'
                ,content: el.getValue()
            }
        });
    }
    ,getComposerJson:function(){
        MODx.Ajax.request({
            url: ComposerConsole.config.connector_url,
            params: {
                action: 'loadfile'
            },
            listeners: {
                success: {fn: function(response) {
                    var el = Ext.getCmp('content-composer-json');
                    el.setValue(response.message);
                }, scope: this}
            }
        });
        return '';
    }
});
Ext.reg('composerconsole-panel-home',ComposerConsole.panel.Home);
