var WsExample = function (config) {
    config = config || {};
    WsExample.superclass.constructor.call(this, config);
};
Ext.extend(WsExample, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('wsexample', WsExample);

WsExample = new WsExample();