WsExample.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'wsexample-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('wsexample') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('wsexample_items'),
                layout: 'anchor',
                items: [{
                    html: _('wsexample_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'wsexample-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    WsExample.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(WsExample.panel.Home, MODx.Panel);
Ext.reg('wsexample-panel-home', WsExample.panel.Home);
