WsExample.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel-test',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'wsexample-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            title: 'Веб сервис',
            layout: 'anchor',
            items: [{
                html: 'Пример веб сервиса на Golang',
                cls: 'panel-desc',
            }, {
                xtype: 'wsexample-grid-items',
                cls: 'main-wrapper',
            }]
        }]
    });
    WsExample.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(WsExample.panel.Home, MODx.Panel);
Ext.reg('wsexample-panel-home', WsExample.panel.Home);
