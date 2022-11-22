<?php

/**
 * The home manager controller for WsExample.
 *
 */
class WsExampleHomeManagerController extends modExtraManagerController
{
    /** @var WsExample $WsExample */
    public $WsExample;


    /**
     *
     */
    public function initialize()
    {
        $this->WsExample = $this->modx->getService('WsExample', 'WsExample', MODX_CORE_PATH . 'components/wsexample/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['wsexample:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('wsexample');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->WsExample->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->WsExample->config['jsUrl'] . 'mgr/wsexample.js');
        $this->addJavascript($this->WsExample->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->WsExample->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->WsExample->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->WsExample->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->WsExample->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->WsExample->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        WsExample.config = ' . json_encode($this->WsExample->config) . ';
        WsExample.config.connector_url = "' . $this->WsExample->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "wsexample-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="wsexample-panel-home-div"></div>';

        return '';
    }
}