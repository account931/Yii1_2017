 <div class="some">
        


admin.view

<?php 
echo CHtml::encode("Admin Access");
echo "</br>";
echo CHtml::image('http://www.bhoovika.in/staff/images/login.gif',
          'this is alt tag of image',  array('border'=>'none','width'=>'','height'=>'','title'=>'image title here'));

 ?>

 

    </div>







<!----------------------------------------NEW!!!!!!START SELECT & display NEW STAT!!! DB  items with CGridView (i.e Admin panel)----------------------------------------->
</br></br></br><hr>

<div class="row">

<h1>All Users' Statistics results </h1>    <!--<img src="http://www.ptea.org.pk/files/Image/SEO-statastic1.jpg"/>-->
   <?php
       $this->widget('zii.widgets.grid.CGridView', array(

          'dataProvider' =>$dataProviderGridAdmin2 ,
	//'dataProvider'=>$model->search(), //  wanted  to plant 'dataProvider22'  but  not  working
	'filter'=>$model,
        'enablePagination' => true,  //  so  far  by  default  the  PAgeSize is 10;

	'columns'=>array(
		array(
			'name'=>'myDB_user_date',   // can not  change  this, make  in model
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->myDB_user_date	), $data->myDB_user_date)' ,  //$data->url;
                        'filter'=>false,
                        'htmlOptions'=>array('width'=>'120px'),
		),



                 array(
			'name'=>'myDB_user',
			'value'=>'$data->myDB_user',           
                        'htmlOptions'=>array('width'=>'50px'),
                         //'filter'=>false,
		),



		array(
			'name'=>'myDB_v_pcs',
			'value'=>'$data->myDB_v_pcs',           //'Lookup::item("PostStatus",$data->myDB_message)',
                        'htmlOptions'=>array('width'=>'50px'),
			//'filter'=>Lookup::items('PostStatus'),
                        //'filter'=>false,
		),


		array(
			'name'=>'myDB_v_h',
			'filter'=>false,
                        'value'=>'$data->myDB_v_h' , 'htmlOptions'=>array('width'=>'20px'),    ),
                     
 

                array(
			'name'=>'myDB_v_perc',
			'filter'=>false,
                        'value'=>'$data->myDB_v_perc'   ,'htmlOptions'=>array('width'=>'30px'), 
                     ),      
                     

                array(
			'name'=>'myDB_g_pcs',
			'filter'=>false,
                        'value'=>'$data->myDB_g_pcs' ,'htmlOptions'=>array('width'=>'30px'),           
                     ),



                array(
			'name'=>'myDB_g_h',
			'filter'=>false,
                        'value'=>'$data->myDB_g_h'  ,'htmlOptions'=>array('width'=>'20px'),             ),


                array(
			'name'=>'myDB_h_perc',
			'filter'=>false,
                        'value'=>'$data->myDB_h_perc' , 'htmlOptions'=>array('width'=>'30px'),     
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








