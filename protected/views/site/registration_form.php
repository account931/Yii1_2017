<h1> <img  src="https://d30y9cdsu7xlg0.cloudfront.net/png/28728-200.png"/><img src="http://circlewaycollege.co.za/wp-content/uploads/2016/02/Register.png"/>Registration</h1>




<?php
 // Set Flash -this  will  appear  if  u  succesfully  save  the  form
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
  // END  Set Flash
?>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php 
           //  shows  red  box  with  unsubmitted  fields
              echo CHtml::errorSummary($model); 
         ?>

<!-------------------------------------------------->
	<div class="row">
		<?php echo $form->labelEx($model,'Your Name'); //The Label Name ?>
		<?php echo $form->textField($model,'username',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>





<!--------------------Password-------------------------------->
	<div class="row">
		<?php echo $form->labelEx($model,'Your  Password'); ?>
		<?php echo $form->PasswordField($model,'password',array('size'=>80,'maxlength'=>128)); ?>
                <?php echo $form->error($model,'password'); ?>
	</div>
<!--------------------------------------------------->






<!-----------------------Repeat Password----------------------------->
	<div class="row">
		<?php echo $form->labelEx($model,'repeat Password'); ?>
		<?php echo $form->PasswordField($model,'repeatpassword',array('size'=>80,'maxlength'=>128)); ?>
                <?php echo $form->error($model,'repeatpassword'); ?>
	</div>
<!--------------------------------------------------->








<!-----------------------E-mail----------------------------->
	<div class="row">
		<?php echo $form->labelEx($model,'E-mail'); ?>
		<?php echo $form->textField($model,'email',array('size'=>80,'maxlength'=>128)); ?>
                <?php echo $form->error($model,'email'); ?>
	</div>
<!--------------------------------------------------->





<!-----------------------Salt----------------------------->
	<div class="row">
		<?php echo $form->labelEx($model,'Salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>80,'maxlength'=>128,'value'=>"Now  u don't  have  to  fill it,it's  auto-generated ")); ?>
                <?php echo $form->error($model,'salt'); ?>
	</div>
<!--------------------------------------------------->







<!---------------------Captcha------------------------>
<?if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest):?>
    <?=CHtml::activeLabelEx($model, 'verifyCode')?>
    <?$this->widget('CCaptcha')?>
    <?=CHtml::activeTextField($model, 'verifyCode')?>
<?endif?>
<!---------------- END Captcha------------------------>







<!------------------------Button----------------------->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Let"s go' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->



<?php
$b=uniqid('',true);  //  just for  testing- casual  usage  of casual php  function uniqid(), CONFIRM DELETE!!;
//echo "Salt=>".$b."</br>";

//Calling  a newly  greated  clone of generateSalt(),as it is  protected -make  a public  copy/ (models-User-generateSalt2()); // CONFIRM DELETE!!
$c=new User;  $v=$c->generateSalt2();//echo "Yii Generated salt ->".$v;
//OOP // CONFIRM DELETE!!
//$c=new User;$res=$c->generateSalt();    echo $res;
?>




