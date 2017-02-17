<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/calc.css" /><!--  CALC CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/split.css" /> <!--  SPLIT CSS-->
       


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/calc.js"></script> <!-- Calc JS-->
         <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/split.js"></script> <!-- SPLIT JS-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page" >

	<div id="header" class="yellowGradientREMOVE" style="background-color:;"> <!--#ffff66;   #ffff4d;-->

		<div id="logo"><?php /*echo CHtml::encode(Yii::app()->name);*/   /*name is in config/main*/          /*echo CHtml::encode(Yii::app()->nameRRR);*/       ?> 
<!--</br> <img src="http://royalmountainrecords.com/wp-content/uploads/2014/01/new-release.png"/> -->       
 <h1 class="shadowX">Dashboard <img src="https://cdn2.iconfinder.com/data/icons/gentle-edges-icon-set/128/Iconfinder_0009_Shape-240.png" style="width:10%;"/>     <span class="shadowX" style="font-size:14px;"> statistics<span> 
<img style="width:15%;float:;position:absolute;right:25%;top:1%;" src="http://hostonfire.com/template2/img/traffic-stats.png"/> <!-- was 180px;-->
</h1></div><!--  END  LOGO-->
	</div><!-- header -->

<!--<div style="clear:both;"></div>-->





<!------------------------------------MAin Menu ----------------------------------------------------->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>array('post/index')),      
                              // ADDDED
//array('label'=>'2F', 'url'=>array('post/index')),
                                array('label'=>'DataBase', 'url'=>array('site/myDBStart')),/*The Mine  DB */
                                
				array('label'=>'About', 'url'=>array('site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('site/contact')),
				array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'Time', 'url'=>array('site/myadd')),/*create action myadd*/
                               // array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest),  //  to last  munu item
                                //array('label'=>'isGuests+', 'url'=>array('site/logout'), 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'Registration', 'url'=>array('site/registration')),
                                array('label'=>'My Info', 'url'=>array('site/myInfo'), 'visible'=>!Yii::app()->user->isGuest),

//Visible  for  admin ONLY
                                array('label'=>'Admin ',  'url'=>array('site/admin') ,'visible'=>!Yii::app()->user->isGuest),   //  ,'visible'=>(Yii::app()->user->getState('roleX') == '2'),   // was  visible  for  ADMIN accessed  users only
//End  Visible  for  Admin Only

                               array('label'=>'Calc', 'url'=>array('site/calc') ),
                               array(  'label'=>'Split coords', 'url'=>array('site/splitCoords'),'visible'=>(Yii::app()->user->getState('roleX') == '2')  )  ,  /*Make  for  all*/
                               array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- END  mainmenu -->






<!------------------------------------------START BREADCUMS-------------------------------------------------->
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
       //my add
             'homeLink'=>CHtml::link('BreadCum_HomeLink(set for site/myadd )', array('/site/myadd')),
       // END  my  add
	)); ?><!-- breadcrumbs -->
<!------------------------------------------END  BREADCUMS-------------------------------------------------->

</br>
<hr style="width:98%;height:5px;background-color:#ebebe0;margin:0 auto;border-radius:20px;"/> <!--#ebebe0-->




<!-------------------------------START additional  menu MY_with loading diffrent menu items  in views------------------------------------------------>
<div id="mainmenuMine">
<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>$this->MineMenu ));
?>
</div><!-- END id="mainmenuMine"-->
<!------------------------------END additional  menu MY_with loading menu items  in views------------------------------------------------>





	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?>    <br/>
		All Rights Reserved .<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>