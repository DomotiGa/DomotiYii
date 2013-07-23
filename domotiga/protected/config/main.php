<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'DomotiGa',
	// path aliases
	'aliases'=>array(
		'bootstrap'=> realpath(__DIR__).'/../extensions/bootstrap',
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
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
		/*
				array(
					'class'=>'CWebLogRoute',
				),
		*/
			),
		),
		'bootstrap'=>array(
			'class'=>'bootstrap.components.TbApi',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'support@domotiga.nl',
		'xmlrpcHost'=>'http://localhost:9009',
		'refreshDevices'=>'5000', // 5 second refresh
		'pagesizeDevices'=>'20', // 20 devices per page in gridview
	),
);
