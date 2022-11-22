<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var WsExample $WsExample */
$WsExample = $modx->getService('WsExample', 'WsExample', MODX_CORE_PATH . 'components/wsexample/model/');
$modx->lexicon->load('wsexample:default');

// handle request
$corePath = $modx->getOption('wsexample_core_path', null, $modx->getOption('core_path') . 'components/wsexample/');
$path = $modx->getOption('processorsPath', $WsExample->config, $corePath . 'processors/');
$modx->getRequest();


/** @var \MODX\Revolution\modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);