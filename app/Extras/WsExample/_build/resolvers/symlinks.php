<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/WsExample/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/wsexample')) {
            $cache->deleteTree(
                $dev . 'assets/components/wsexample/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/wsexample/', $dev . 'assets/components/wsexample');
        }
        if (!is_link($dev . 'core/components/wsexample')) {
            $cache->deleteTree(
                $dev . 'core/components/wsexample/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/wsexample/', $dev . 'core/components/wsexample');
        }
    }
}

return true;