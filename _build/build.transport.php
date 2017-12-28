<?php

/**
 * @param string $filename The name of the file.
 * @return string The file's content
 * @by splittingred
 */
function getSnippetContent($filename = '') {
    $o = file_get_contents($filename);
    $o = str_replace('<?php','',$o);
    $o = str_replace('?>','',$o);
    $o = trim($o);
    return $o;
}

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;
set_time_limit(0);

if (!defined('MOREPROVIDER_BUILD')) {
    /* define version */
    define('PKG_NAME','Commerce_TableRates');
    define('PKG_NAMESPACE','commerce_tablerates');
    define('PKG_VERSION','1.0.0');
    define('PKG_RELEASE','rc2');

    /* load modx */
    require_once dirname(dirname(__FILE__)) . '/config.core.php';
    require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
    $modx= new modX();
    $modx->initialize('mgr');
    $modx->setLogLevel(modX::LOG_LEVEL_INFO);
    $modx->setLogTarget('ECHO');


    echo '<pre>';
    flush();
    $targetDirectory = dirname(dirname(__FILE__)) . '/_packages/';
}
else {
    $targetDirectory = MOREPROVIDER_BUILD_TARGET;
}

$root = dirname(dirname(__FILE__)).'/';
$sources= array (
    'root' => $root,
    'build' => $root .'_build/',
    'events' => $root . '_build/events/',
    'resolvers' => $root . '_build/resolvers/',
    'validators' => $root . '_build/validators/',
    'data' => $root . '_build/data/',
    'plugins' => $root.'_build/elements/plugins/',
    'snippets' => $root.'_build/elements/snippets/',
    'source_core' => $root.'core/components/'.PKG_NAMESPACE,
    'source_assets' => $root.'assets/components/'.PKG_NAMESPACE,
    'lexicon' => $root . 'core/components/'.PKG_NAMESPACE.'/lexicon/',
    'docs' => $root.'core/components/'.PKG_NAMESPACE.'/docs/',
    'model' => $root.'core/components/'.PKG_NAMESPACE.'/model/',
);
unset($root);


$modx->loadClass('transport.xPDOTransport', XPDO_CORE_PATH, true, true);


/** @var xPDOTransport $package */
$package = new xPDOTransport($modx, PKG_NAMESPACE, $targetDirectory);
$package->signature = PKG_NAMESPACE . '-' . PKG_VERSION . '-' . PKG_RELEASE;

$modx->log(xPDO::LOG_LEVEL_INFO, 'Transport package for ' . PKG_NAME. ' created.'); flush();

/* include namespace */
$namespace = $modx->newObject('modNamespace');
$namespace->set('name', PKG_NAMESPACE);
$namespace->set('path', '{core_path}components/' . PKG_NAMESPACE . '/');
$namespace->set('assets_path', '{assets_path}components/' . PKG_NAMESPACE . '/');

$attributes = array(
    xPDOTransport::PRESERVE_KEYS => true,
    xPDOTransport::UPDATE_OBJECT => true,
);
$attributes['validate'][] = array (
    'type' => 'php',
    'source' => $sources['validators'] . 'requirements.script.php',
);
$package->put($namespace, $attributes);
unset($namespace);
$modx->log(xPDO::LOG_LEVEL_INFO, 'Namespace "' . PKG_NAMESPACE . '" packaged.'); flush();


/** @var array $attributes */
$attributes = array(
    'vehicle_class' => 'xPDOFileVehicle',
);
$attributes['resolve'][] = array (
    'type' => 'php',
    'source' => $sources['resolvers'] . 'loadmodules.resolver.php',
);

$files = array();
$files[] = array(
    'source' => $sources['source_core'],
    'target' => "return MODX_CORE_PATH . 'components/';",
);

foreach ($files as $fileset) {
    $package->put($fileset, $attributes);
}
unset ($files, $fileset);

$modx->log(xPDO::LOG_LEVEL_INFO, 'Files for "' . PKG_NAMESPACE . '" packaged.'); flush();

/* now pack in the license file, readme and setup options */
$attributes = array(
    'readme' => file_get_contents($sources['source_core'] . '/docs/readme.txt'),
    'license' => file_get_contents($sources['source_core'] . '/docs/license.txt'),
    'changelog' => file_get_contents($sources['source_core'] . '/docs/changelog.txt'),
);
foreach ($attributes as $k => $v) {
    $package->setAttribute($k, $v);
}

/* zip up the package */
$package->pack();


$tend = explode(" ", microtime());
$tend = $tend[1] + $tend[0];
$totalTime = sprintf("%2.4f s", ($tend - $tstart));

$modx->log(modX::LOG_LEVEL_INFO, "Package " . $package->signature . " built. Execution time: {$totalTime}\n");

