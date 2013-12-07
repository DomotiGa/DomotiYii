<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'DomotiGa',
	// path aliases
	'aliases'=>array(
		'bootstrap'=> realpath(__DIR__.'/../extensions/bootstrap'),
		'domotiyii' => realpath(__DIR__ . '/../extensions/domotiyii'),
	),
	// preloading 'log' component
	'preload'=>array(
		'log'
	),
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'bootstrap.helpers.TbHtml',
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Giiha',
			'ipFilters' => array('127.0.0.1', '192.168.*.*'),
			'generatorPaths' => array('bootstrap.gii'),
		),
	),
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'mobile/<id:\d+>'=>'mobile/site/view',
				'mobile/<action:\w+>/<id:\d+>'=>'mobile/site/<action>',
				'mobile/<action:\w+>'=>'mobile/site/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=domotiga',
			'emulatePrepare' => true,
			'username' => 'domouser',
			'password' => 'kung-fu',
			'charset' => 'utf8',
			// uncomment the following to get sql statistics inside debug toolbar
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info',
				),
				// uncomment the following to show debug toolbar
/*
				array(
					'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					'ipFilters'=>array('*'),
				)
*/
			),
		),
		'bootstrap'=>array(
			'class'=>'bootstrap.components.TbApi',
		),
		'domotiyii' => array(
			'class' => 'domotiyii',
		),
		'mobileDetect' => array(
			'class' => 'domotiyii.MobileDetect'
		),
	),

	// language settings
	'sourceLanguage' => 'en',
	'language' => 'nl', // add new translations under protected/messages/ 

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// default timezone
		'timeZone'=>'Europe/Amsterdam',
		// server settings
		'jsonrpcHost'=>'http://localhost:9090',
		// refresh time for specific gridviews
		'refreshDevices'=>'5000', // 5 second refresh
		'refreshPhonecalls'=>'5000', // 5 second refresh
		'refreshContacts'=>'5000', // 5 second refresh
		'refreshEvents'=>'5000', // 5 second refresh
		'refreshTriggers'=>'5000', // 5 second refresh
		'refreshConditions'=>'5000', // 5 second refresh
		'refreshActions'=>'5000', // 5 second refresh
		'refreshCategories'=>'5000', // 5 second refresh
		'refreshDevicetypes'=>'5000', // 5 second refresh
		'refreshGroups'=>'5000', // 5 second refresh
		'refreshLocations'=>'5000', // 5 second refresh
		'refreshFloors'=>'5000', // 5 second refresh
		'refreshUsers'=>'5000', // 5 second refresh
		'refreshCameras'=>'5000', // 5 second refresh
		'refreshMobile'=>'5000', // 5 second refresh
		
		// page size for specific gridviews
		'pagesizeDevices'=>'20', // entries per page
		'pagesizePhonecalls'=>'30', // entries per page
		'pagesizeContacts'=>'20', // entries per page
		'pagesizeEvents'=>'20', // entries per page
		'pagesizeTriggers'=>'20', // entries per page
		'pagesizeConditions'=>'20', // entries per page
		'pagesizeActions'=>'20', // entries per page
		'pagesizeCategories'=>'20', // entries per page
		'pagesizeDevicetypes'=>'20', // entries per page
		'pagesizeGroups'=>'20', // entries per page
		'pagesizeLocations'=>'20', // entries per page
		'pagesizeFloors'=>'20', // entries per page
		'pagesizeUsers'=>'20', // entries per page
		'pagesizeCameras'=>'20', // entries per page
	),
);
