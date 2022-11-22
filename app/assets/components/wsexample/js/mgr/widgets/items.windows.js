WsExample.window.CreateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'wsexample-item-window-create';
    }
    Ext.applyIf(config, {
        title: 'Создать скриншот',
        width: 550,
        autoHeight: true,
        url: WsExample.config.connector_url,
        action: 'mgr/item/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    WsExample.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(WsExample.window.CreateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'textfield',
            fieldLabel: 'Селектор',
            name: 'element',
            id: config.id + '-element',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textfield',
            fieldLabel: 'Наименование',
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textfield',
            fieldLabel: 'URL',
            name: 'url',
            id: config.id + '-url',
            anchor: '99%',
            allowBlank: false,
        }];
    },

});
Ext.reg('wsexample-item-window-create', WsExample.window.CreateItem);

WsExample.window.ViewItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'wsexample-item-window-view';
    }
    Ext.applyIf(config, {
        title: 'Просмотр',
        width: 550,
        autoHeight: true,
        fields: this.getFields(config),
        buttons: [{
            text: config.cancelBtnText || _('cancel')
            ,scope: this
            ,handler: function() { config.closeAction !== 'close' ? this.hide() : this.close(); }
        }]
    });
    WsExample.window.ViewItem.superclass.constructor.call(this, config);
};
Ext.extend(WsExample.window.ViewItem, MODx.Window, {

    getFields: function (config) {
        return [{
            html: '<img class="inner-image" src="'+config.record.object.image+'" />'
        }];
    },

});
Ext.reg('wsexample-item-window-view', WsExample.window.ViewItem);