<?php
require_once 'vendor/autoload.php';
define('BASE_DIR', './');
use \Frame\Core\Application;
$app = new Application();
$app->init();
$app->finalize();
