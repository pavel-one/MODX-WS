/**
 * Loads the chunk update page
 *
 * @class MODx.page.UpdateChunk
 * @extends MODx.Component
 * @param {Object} config An object of config properties
 * @xtype modx-page-chunk-update
 */
MODx.page.UpdateChunk = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        formpanel: 'modx-panel-chunk'
        ,buttons: this.getButtons(config)
        ,components: [{
            xtype: 'modx-panel-chunk'
            ,renderTo: 'modx-panel-chunk-div'
            ,chunk: config.record.id || MODx.request.id
            ,record: config.record || {}
        }]
    });
    MODx.page.UpdateChunk.superclass.constructor.call(this,config);
};
Ext.extend(MODx.page.UpdateChunk,MODx.Component, {
    duplicate: function(btn, e) {
        var rec = {
            id: this.record.id
            ,type: 'chunk'
            ,name: _('duplicate_of',{name: this.record.name})
            ,source: this.record.source
            ,static: this.record.static
            ,static_file: this.record.static_file
            ,category: this.record.category
        };
        var w = MODx.load({
            xtype: 'modx-window-element-duplicate'
            ,record: rec
            ,redirect: true
            ,listeners: {
                success: {
                    fn: function(r) {
                        var response = Ext.decode(r.a.response.responseText);
                        if (response.object.redirect) {
                            MODx.loadPage('element/'+ rec.type +'/update', 'id='+ response.object.id);
                        } else {
                            var t = Ext.getCmp('modx-tree-element');
                            if (t && t.rendered) {
                                t.refresh();
                            }
                        }
                    },scope:this}
                ,hide:{fn:function() {this.destroy();}}
            }
        });
        w.show(e.target);
    }
    ,delete: function(btn, e) {
        MODx.msg.confirm({
            text: _('chunk_delete_confirm')
            ,url: MODx.config.connector_url
            ,params: {
                action: 'Element/Chunk/Remove'
                ,id: this.record.id
            }
            ,listeners: {
                success: {
                    fn: function(r) {
                        MODx.loadPage('?');
                    },scope:this}
            }
        });
    }
    ,getButtons: function(config) {
        var config = config || {};

        var buttons = [{
            process: 'Element/Chunk/Update'
            ,text: _('save')
            ,id: 'modx-abtn-save'
            ,cls: 'primary-button'
            ,method: 'remote'
            ,keys: [{
                key: MODx.config.keymap_save || 's'
                ,ctrl: true
            }]
        },{
            text: _('duplicate')
            ,id: 'modx-abtn-duplicate'
            ,handler: this.duplicate
            ,scope: this
        },{
            text: _('cancel')
            ,id: 'modx-abtn-cancel'
        },{
            text: '<i class="icon icon-trash-o"></i>'
            ,id: 'modx-abtn-delete'
            ,handler: this.delete
            ,scope: this
        },{
            text: '<i class="icon icon-question-circle"></i>'
            ,id: 'modx-abtn-help'
            ,handler: MODx.loadHelpPane
        }]

        return buttons;
    }
});
Ext.reg('modx-page-chunk-update',MODx.page.UpdateChunk);
