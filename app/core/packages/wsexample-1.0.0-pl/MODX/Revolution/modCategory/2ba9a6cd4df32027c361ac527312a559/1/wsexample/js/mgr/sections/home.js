WsExample.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'wsexample-panel-home',
            renderTo: 'wsexample-panel-home-div'
        }]
    });
    WsExample.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(WsExample.page.Home, MODx.Component);
Ext.reg('wsexample-page-home', WsExample.page.Home);