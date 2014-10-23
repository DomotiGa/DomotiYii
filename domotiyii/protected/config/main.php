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
				'mobile/<id:\d+>'=>'mobile/<controller>/view',
				'mobile/<action:\w+>/<id:\d+>'=>'mobile/<controller>/<action>',
				'mobile/<controller:\w+>/<action:\w+>'=>'mobile/<controller>/<action>',
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
	'language' => 'en', // add new translations under protected/messages/ 

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// default timezone
		'timeZone'=>'Europe/Amsterdam',
		// server settings
		'jsonrpcHost'=>'http://localhost:9090',
		// Security allow mobile control without login
	  	'allowMobileWithoutLogin'=>False, // Dont allow, you can do this if you have setup ssl client certificate
		// refresh time for specific gridviews
		'versionDBRequired'=>'1.0.016', // database min version needed
		'refreshDevices'=>'5000', // 5 second refresh
		'refreshDeviceValues'=>'5000', // 5 second refresh
		'refreshDeviceValuesLog'=>'5000', // 5 second refresh
		'refreshPhonecalls'=>'5000',
		'refreshContacts'=>'5000',
		'refreshEvents'=>'5000',
		'refreshTriggers'=>'5000',
		'refreshConditions'=>'5000',
		'refreshActions'=>'5000',
		'refreshCategories'=>'5000',
		'refreshDevicetypes'=>'5000',
		'refreshGroups'=>'5000',
		'refreshLocations'=>'5000',
		'refreshFloors'=>'5000',
		'refreshUsers'=>'5000',
		'refreshCameras'=>'5000',
		'refreshGlobalvars'=>'5000',
		'refreshDeviceBlacklist'=>'5000',
		'refreshInterfaces'=>'5000',
		'refreshMobile'=>'5000',
		
		// page size for specific gridviews
		'pagesizeDevices'=>'20', // entries per page
		'pagesizePhonecalls'=>'30',
		'pagesizeContacts'=>'20',
		'pagesizeEvents'=>'20',
		'pagesizeTriggers'=>'20',
		'pagesizeConditions'=>'20',
		'pagesizeActions'=>'20',
		'pagesizeCategories'=>'20',
		'pagesizeDevicetypes'=>'20',
		'pagesizeGroups'=>'20',
		'pagesizeLocations'=>'20',
		'pagesizeFloors'=>'20',
		'pagesizeUsers'=>'20',
		'pagesizeCameras'=>'20',
		'pagesizeGlobalvars'=>'20',
		'pagesizeDeviceBlacklist'=>'20',
		'pagesizeInterfaces'=>'20',
	),
);
