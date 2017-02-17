<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.





return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Yii 2016 Release',
        // 'nameRRR'=>'UKRAINE', //ADDED!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

           //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
          //WAS ADDED
            'theme' => 'classic',

//My  time
 'timeZone' => 'Europe/Kiev',
//My  time



// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
//Gii ACTIVATION  mine
'modules'=>array(
    'gii'=>array( // &#1052;&#1086;&#1076;&#1091;&#1083;&#1100; &#1075;&#1077;&#1085;&#1077;&#1088;&#1072;&#1094;&#1080;&#1080; &#1082;&#1086;&#1076;&#1072;, &#1082;&#1086;&#1090;&#1086;&#1088;&#1099;&#1081; &#1084;&#1086;&#1078;&#1085;&#1086; &#1080;&#1089;&#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1100;
        'class'=>'system.gii.GiiModule',
        'password'=>'admin',
        'ipFilters'=>array(),
    ),
),
//End  gii  mine
// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************




	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'defaultController'=>'site',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
    

    // SQL  Lite  Killed
		/*'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),*/
		






                       // uncomment the following to use a MySQL database!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!111
// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
		
		'db'=>array(
			'connectionString' => 'mysql:host=mysql.hostinger.com.ua;dbname=u635964300_yii',
			'emulatePrepare' => true,
			'username' => 'u635964300_accou',
			'password' => 'mallwa931',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************

		//****************************************







		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),







// **************************************************************************************
// **************************************************************************************
// **                                                                                  **
	
             // Mine  deactivated  URL  manager 
        'urlManager'=>array(
        	'urlFormat'=>'path',
        	'rules'=>array(
        		'post/<id:\d+>/<title:.*?>'=>'post/view',
        		'posts/<tag:.*?>'=>'post/index',
        		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        	),
        ),
// **                                                                                  **
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************







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
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);