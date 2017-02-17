<?php
//Is used  for  detailed  view of  1  record (from CGRIDVIEW clicking);
// Was  used  both  for CDataList and  viewing  1  item  from CGridView  but  now  for viewing 1 item  from CGridView;
//additionally  contain a linl  for  EDITING;
// The  main trick  is  that=> in Controller  u  generate $dataProvider &  render it. In View u  create  Zii,Widget and pass  there  as dataProvider'=>$dataProvider
//But  for  some  bizzare  reason in partial  view (_view) used $data  instead  of  passed $dataProvider
// This  sub view  is  used  both for  viewing  1  item & for  CDetailView

?>



 <div class="post_title">
 <?php 
 // echo CHtml::encode($data->getAttributeLabel('title'));
 //echo CHtml::encode($data->getAttributeLabel('myDB_name'));
 //echo CHtml::encode($data->myDB_name);
 ?>
 </div>

 <br/><hr/>






<!-------------------------------NEW   GRIDVIEW  STAT-------------------------->
<div class="post_content" style="color:black;font-size:14px;">
<?php
    echo '<img  src="../../images/calendarDate.jpg"/></br>';   // WORKS- get  the  ROOT  folder; 
   
                                              

echo '<span style="color:red;font-size:16px;text-decoration: underline">'; //Date  in Red  color-->
    echo CHtml::encode($data->myDB_user_date." -->"); echo "</br>";
echo '</span>';  //END Date  in Red  color-->




    echo CHtml::encode($data->myDB_v_pcs ." Venues per " .$data->myDB_v_h . " = " .$data->myDB_v_perc);echo "</br>";
    echo CHtml::encode($data->myDB_g_pcs ." Geos per " .$data->myDB_g_h . " = " .$data->myDB_h_perc);
    echo "</br></br></br>";
 //My Yii link  for  Editing;
   echo CHtml::link('Yii EDit Link ',array('/site/update?id='.$data->myDB_id)); 
   echo "</br></br></br>";
 ?>
 </div>
<!-------------------------------END NEW   GRIDVIEW  STAT-------------------------->






