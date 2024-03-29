<?php

session_start();

ini_set('magic_quotes_runtime', 0);
//
define('WEBROOT', realpath(dirname(__FILE__)));
define('APPROOT', realpath(dirname(__FILE__) . '/../anr'));
define('VIEWROOT', APPROOT . '/views');

if (is_file(WEBROOT . '/config.local.php')) {
    include WEBROOT . '/config.local.php';
}
include APPROOT . '/core/helpers/config.php';
include APPROOT . '/core/helpers/autoload.php';

$app = new System();
$app->execute();
