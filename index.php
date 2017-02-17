<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';    //it  was=> $yii=dirname(__FILE__).'/../../framework/yii.php';  ->meaning 2 folders up;
//  changin the path allows  to   deploy  your  YIi  anyhere  without  consoling

$config=dirname(__FILE__).'/protected/config/main.php';   //don't  have  to  change  as protected  is  inside  the  target  folder;

// remove the following line when in production mode
// defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
