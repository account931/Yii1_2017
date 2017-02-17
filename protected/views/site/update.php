<?php
//added  by  me in attempt  of  UPDATE  procedures
//it uses view-MyUpdateForm to  render  FORM  for  Editing/


//BReadcums  Mine
/*$this->breadcrumbs=array(
	$model->myDB_name=>$model->myDB_name,
	'Update_Mine',
);*/
?>




<!---------------------------------------------------Setting  Flash Message------------------------------------------------>
<?php
 // Set Flash -this  will  appear  if  u  succesfully  save  the  form*
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
  // END  Set Flash-
?>
<!----------------------------------------------END  Setting  Flash Message ------------------------------------------------>


<h1>Update <i><?php echo CHtml::encode($model->myDB_name); ?></i></h1>

<?php echo $this->renderPartial('MyUpdateForm', array('model'=>$model)); ?>