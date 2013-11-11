<?php
require("function_alias.php");
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
$strPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'components' ;
$baseath = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR ;
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('widgets',$strPath.DIRECTORY_SEPARATOR.'widgets');
// Yii::setPathOfAlias('utils',$baseath.DIRECTORY_SEPARATOR.'utils');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . "/../extensions/bootstrap");
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('ace',$baseath . '..' . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . "ace");

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.*',
		
		'application.modules.user.components.*',
		'application.modules.user.models.*',
		'application.modules.user.models.Users',
		
		
		'application.modules.rights.*',
		'application.modules.rights.components.*',
		
		
		
		
		
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
        'user',
        'rights',
		'gii'=>array(
			'class' => 'system.gii.GiiModule',
			'password' => 'qthinh',
			'generatorPaths' => array(
				'ext.bootstrap.gii', 
				'ext.gtc' // a path alias
			),
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
		),
		
		
	),
	'language'=> 'en',
	// application components
	'components'=>array(
		'bootstrap'=>array(
			'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
		),
		
		'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
			'transportType' => 'smtp',
			'transportOptions' => array(
				'host'=>'smtp.gmail.com',
				'username'=>'noreplytickgoals@gmail.com',
				'password'=>'noreplytickgoals123',
				'port'=>'465',
				'encryption'=>'tls'
			),
			'viewPath' => 'application.views.mail',
			'logging' => true,
			'dryRun' => false
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			// 'class'=>'CWebUser',
			'loginUrl'=>array('/'),
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules' => array(				
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			)
		),
		
		// 'db'=>array(
			// 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=trackings',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		// 'authManager'=>array( 
			// 'class'=>'RDbAuthManager',

		// ),
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
		'cache'=>array(
            'class'=>'system.caching.CFileCache',
        )
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'reminder@tickgoals.com'
		
	),
);