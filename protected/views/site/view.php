<?php
$this->breadcrumbs=array(
	$model->myDB_name,
);
$this->pageTitle=$model->myDB_message;
$this->pageTitle=$model->myDB_user_date;//  when  updating   NEW  GRIDVIEW;
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


<?php
//  echo "Hello, " .Yii::app()->user->name;
?>


<?php $this->renderPartial('_view', array(
	'data'=>$model,
)); ?>



