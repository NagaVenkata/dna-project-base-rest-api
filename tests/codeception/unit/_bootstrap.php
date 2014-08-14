<?php

$_SERVER['SCRIPT_FILENAME'] = 'index-test.php';
$_SERVER['SCRIPT_NAME'] =  '/index-test.php';
$_SERVER['REQUEST_URI'] = 'index-test.php';

// require composer autoloader
require_once(dirname(__FILE__).'/../../../vendor/autoload.php');

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../../vendor/yiisoft/yii/framework/yiit.php';
require_once($yiit);
$main=require(dirname(__FILE__).'/../../../app/config/main.php');
$env=require(dirname(__FILE__)."/../../../app/config/environments/" . CONFIG_ENVIRONMENT . ".php");

//require_once(dirname(__FILE__).'/WebTestCase.php');

$config = CMap::mergeArray($main, $env);
$config['components']['db'] = $config['components']['dbTest'];

if (!Yii::app()) Yii::createWebApplication($config);
