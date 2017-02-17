<?php
//display and load breadcums value for   this  view.Widget by itself is declared with  $this->breadcrumb array  for  items  ('items'=>$this->MineMenu)
/*$this->breadcrumbs=array(
	'Z',
);*/


// Menu  for  this  page ,  decalred  in view-main.php  as a  menu  without items (itemas  as  an  array  set  in  this  view;)
/*$this->MineMenu =array(
array('label'=>'DB_AboutXX', 'url'=>array('site/page', 'view'=>'about')),
array('label'=>'DB_AboutZZ', 'url'=>array('site/page', 'view'=>'about')),  );*/



// my  view,  created for form  displaying(  for  input   record) +  displaying  the  results  from DB
  

echo "</br><h3 class='shadowX'>Statictics DATABASE - ";
echo '<span style="font-size:16px;"  class="shadowX"> Record your daily performance (pcs/hour)</span></h3></br>';

//echo htmlspecialchars('<a href>'). " to  this  page  is  located  in layout/main.php, and  is  triggered  by  action in SiteController, ";

 echo "Hello, " .Yii::app()->user->name."&nbsp;&nbsp;";
  echo CHtml::link('instructions,if  don"t  know  how  to proceed',array('site/page?view=about'), array('style'=>'font-size:9px;')); 
echo '</br><img style="width:40%;" src="http://3.bp.blogspot.com/-tTXEI5IiQh4/VQqaJz4LtSI/AAAAAAAAEL8/n5AwTVNI-Us/s1600/Introduction%2Bto%2BSQL.png"/>';


  
?>
</br>



<!---------------------------------------------------Setting  Flash------------------------------------------------>
<?php
 // Set Flash -this  will  appear  if  u  succesfully  save  the  form*
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
  // END  Set Flash-
?>
<!---------------------------------------------------END   Setting  Flash------------------------------------------------>




</br></br>
 <!--<span style="font-size:16px;"  class="shadowX"> Record your daily performance (pcs/hour)</span></br>-->
<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note" style="font-size:9px;">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>


      <?php  $d=date('j-M-D-Y'); ?>

        <!-------DATE----->
	<div class="row">
		<?php echo $form->labelEx($model,'myDB_user_date'); //The Label Name ?>
		<?php echo $form->textField($model,'myDB_user_date',array('size'=>50,'maxlength'=>128,'value'=>$d )); ?>
		<?php echo $form->error($model,'myDB_user_date'); ?>
               
	</div>  







<!--------V Start -------->
	<div class="row">
             <div class="span-8">  <!--  Remove  this & closing to  arrange  inputs  again horizontal-->
		<?php echo $form->labelEx($model,'Venue amount'); //The Label Name ?>
		<?php echo $form->textField($model,'myDB_v_pcs',array('size'=>10,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_v_pcs'); ?>
              </div>   <!--Remove to  horizont it-->


            <div class="span-8 last">  <!--  Remove  this & closing to  arrange  inputs  again horizontal-->
                <?php echo $form->labelEx($model,'Venues hours'); //The Label Name ?>
		<?php echo $form->textField($model,'myDB_v_h',array('size'=>10,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_v_h'); ?>
           </div><!--Remove to  horizont it-->
	</div> <!--  END  <div class="row">-->

<!--------V End -------->

<div style="clear:both;"></div><!-- To  avoid  further  floating-->






<!--------G Start -------->



        <div class="row">
             <div class="span-8"> 
		<?php echo $form->labelEx($model,'Geo amount'); //The Label Name ?>
		<?php echo $form->textField($model,'myDB_g_pcs',array('size'=>10,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_g_pcs'); ?>
             </div>

            <div class="span-8 last">
                <?php echo $form->labelEx($model,'Geo Hours'); //The Label Name ?>
		<?php echo $form->textField($model,'myDB_g_h',array('size'=>10,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_g_h'); ?>
            </div>
	</div> <!--  END <div class="row">-->

<div style="clear:both;"></div><!-- To  avoid  further  floating-->



<!--  START Commented Horizontal  sample  for  future-->
	<!--<div class="row">
		<?php echo $form->labelEx($model,'g_pcs'); //The Label Name ?>
		<?php echo $form->textField($model,'myDB_g_pcs',array('size'=>10,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_g_pcs'); ?>



                <?php echo $form->labelEx($model,'g_hours'); //The Label Name ?>
		<?php echo $form->textField($model,'myDB_g_h',array('size'=>10,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'myDB_g_h'); ?>
	</div>-->
<!--  END  Commented  Horizontal  sample  for  future-->
<!--------G End -------->







	  <div class="row">
		<?php // echo $form->labelEx($model,'tags'); ?>
		<?php /* $this->widget('CAutoComplete', array(
			'model'=>$model,
			'attribute'=>'tags',
			'url'=>array('suggestTags'),
			'multiple'=>true,
			'htmlOptions'=>array('size'=>50),
		));*/ ?>
		
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'status'); ?>
		<?php //echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
		<?php //echo $form->error($model,'status'); ?>
	</div>







<!--------------Button------->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'record it' : 'Save'   ,           array('class' => 'submitClass','id'=>'2F', 'style' => ' border-radius: 4px;')            ); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->























<!-------------------------------------------START SELECT & display  DB  items in CListView with CActiveDataProvider-------------------------------------------------->
</br></br></br><hr>
<div class="row">
<!--<center>-->
<h1>Your  last  days Statistics </h1>
   <?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewDataProvider',
/*'template'=>"{items}\n{pager}"*/  /*was  added*/
	
));
//  was + /*'template'=>"{items}\n{pager}",*/
 ?>
<!--</center>-->
</div>
<!------------------------------------------END  SELECT & display  DB  items in CListView with CActiveDataProvider-------------------------------------------------->
















<!----------------------------------------NEW!!!!!!START SELECT & display NEW STAT!!! DB  items with CGridView (i.e Admin panel)----------------------------------------->
</br></br></br></br></br><hr>
<div class="row">

<h1>View , Edit or  Delete  your Statistics  Entries</h1>
 <img src="http://www.ptea.org.pk/files/Image/SEO-statastic1.jpg"/>
   <?php
       $this->widget('zii.widgets.grid.CGridView', array(

          'dataProvider' => $dataProviderGridNewStat,
	//'dataProvider'=>$model->search(), //  wanted  to plant 'dataProvider22'  but  not  working
	'filter'=>$model,
        'enablePagination' => true,  //  so  far  by  default  the  PAgeSize is 10;

	'columns'=>array(
		array(
			'name'=>'myDB_user_date',   // can not  change  this, make  in model
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->myDB_user_date	), $data->myDB_user_date)' ,  //$data->url;
                        'filter'=>false,
                        'htmlOptions'=>array('width'=>'120px'), /*  was 120px;*/
		),



                 array(
			'name'=>'myDB_user',
			'value'=>'$data->myDB_user',           
                        'htmlOptions'=>array('width'=>'50px'),
                         'filter'=>false,
		),



		array(
			'name'=>'myDB_v_pcs',
			'value'=>'$data->myDB_v_pcs',           //'Lookup::item("PostStatus",$data->myDB_message)',
                        'htmlOptions'=>array('width'=>'50px'),
			//'filter'=>Lookup::items('PostStatus'),
                        'filter'=>false,
		),


		array(
			'name'=>'myDB_v_h',
			'filter'=>false,
                        'value'=>'$data->myDB_v_h' , 'htmlOptions'=>array('style' => 'width: 5px;'),    ),
                     
 

                array(
			'name'=>'myDB_v_perc',
			'filter'=>false,
                        'value'=>'$data->myDB_v_perc'   ,'htmlOptions'=>array('width'=>'20px'), 
                     ),      
                     

                array(
			'name'=>'myDB_g_pcs',
			'filter'=>false,
                        'value'=>'$data->myDB_g_pcs' ,'htmlOptions'=>array('width'=>'20px'),           
                     ),



                array(
			'name'=>'myDB_g_h',
			'filter'=>false,
                        'value'=>'$data->myDB_g_h'  ,'htmlOptions'=>array('width'=>'20px'),             ),


                array(
			'name'=>'myDB_h_perc',
			'filter'=>false,
                        'value'=>'$data->myDB_h_perc' , 'htmlOptions'=>array('width'=>'20px'),     
                     ),




                array(
			'name'=>'myDB_ip',
			'filter'=>false,
                        'value'=>'$data->myDB_ip'),


		array(
			'class'=>'CButtonColumn',
		),
	), 
) );
?>

</div>
<!--------------------------------------END NEW!!! SELECT & display NEW STAT!!! DB  items with CGridView (i.e Admin panel)-------------------------------------------------->
















