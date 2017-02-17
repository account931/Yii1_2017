<!-- Update form  for  User profile----->
<div class="form">
<!-- added  by  me  in attempt  of  UPDATE  procedures-->

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>



       <div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div>




       <div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

