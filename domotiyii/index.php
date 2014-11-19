<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// disable these 3 lines when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG',true);
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
//ini_set('error_reporting', E_ALL);

require_once($yii);
$app = Yii::createWebApplication($config);

// set timezone if default is not set to keep PHP strict happy
$app->setTimeZone(Yii::app()->params['timeZone']);

// load helper
require_once(dirname(__FILE__).'/protected/components/helpers.php');

// start app
$app->run();
