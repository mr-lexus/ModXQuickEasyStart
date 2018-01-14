var ComposerConsole = function(config) {
    config = config || {};
    ComposerConsole.superclass.constructor.call(this,config);
};
Ext.extend(ComposerConsole,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('composerconsole',ComposerConsole);

ComposerConsole = new ComposerConsole();