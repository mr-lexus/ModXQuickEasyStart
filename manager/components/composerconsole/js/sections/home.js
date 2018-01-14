Ext.onReady(function() {
    MODx.load({ xtype: 'composerconsole-page-home'});
});

ComposerConsole.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'composerconsole-panel-home'
            ,renderTo: 'composerconsole-panel-home-div'
        }]
    }); 
    ComposerConsole.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(ComposerConsole.page.Home,MODx.Component);
Ext.reg('composerconsole-page-home',ComposerConsole.page.Home);