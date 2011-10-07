<?php

// Error logging settings
ini_set('error_reporting', E_ALL | E_STRICT);
error_reporting(E_ALL | E_STRICT);

ini_set('log_errors', true);
ini_set('html_errors', false);
ini_set('display_errors', false);
ini_set('error_log', APPROOT . '/logs/anr.' . date('ymd') . '.log');