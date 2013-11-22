<?php

$dir = realpath(dirname(__FILE__).'/..').'/';

// register composer autoloader
require_once(dirname(__FILE__).'/../vendor/autoload.php');

//define("YII_DEBUG", true);

// load Yii
require_once($dir.'vendor/yiisoft/yii/framework/yii.php');

// load helper functions
require_once($dir.'app/helpers/global.php');

// config files
$main   = require($dir.'app/config/main.php');
$local  = require($dir.'app/config/main-local.php');
$env    = require($dir.'app/config/env-'.$main['params']['env'].'.php');

// define YII_DEBUG in config files
if (defined('YII_DEBUG') && YII_DEBUG)
    error_reporting(E_ALL | E_STRICT);

// merge configurations
$config = CMap::mergeArray($main,$env,$local);

// start web application
Yii::createWebApplication($config)->run();
