<!-- Update form  for  NEW  GRIDVIEW , as  long  as  can not  separate   to  2 files----->
<div class="form">
<!-- added  by  me  in attempt  of  UPDATE  procedures-->

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'myDB_user_date'); ?>
		<?php echo $form->textField($model,'myDB_user_date',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_user_date'); ?>
	</div>



        <div class="row">
		<?php echo $form->labelEx($model,'V_amount'); ?>
		<?php echo $form->textField($model,'myDB_v_pcs',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_myDB_v_pcs'); ?>
	</div>



        <div class="row">
		<?php echo $form->labelEx($model,'V_hours'); ?>
		<?php echo $form->textField($model,'myDB_v_h',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_v_h'); ?>
	</div>



        <div class="row">
		<?php echo $form->labelEx($model,'G_amount'); ?>
		<?php echo $form->textField($model,'myDB_g_pcs',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_g_pcs'); ?>
	</div>
	


       <div class="row">
		<?php echo $form->labelEx($model,'G_hours'); ?>
		<?php echo $form->textField($model,'myDB_g_h',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_g_h'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->






























