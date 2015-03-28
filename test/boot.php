<?php

require_once __DIR__ . '/../vendor/autoload.php';

$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->add('Bigtallbill', __DIR__ . '/../src');
$classLoader->register();

define('TEST_ASSETS_DIR', __DIR__ . '/assets');
