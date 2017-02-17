<?php
// USED FOR  C_DATA_Provider; 
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




 <div class="post_content">
 <?php 
 // echo CHtml::encode($data->getAttributeLabel('content'));
echo "<span  style='color:red;'>";
 echo CHtml::encode($data->myDB_user_date." : ->" );
echo "</span>";
  echo CHtml::encode(" Venue : (" );
 echo CHtml::encode($data->myDB_v_pcs."/");
 echo CHtml::encode($data->myDB_v_h."H= ");
 echo CHtml::encode($data->myDB_v_perc  ." ); Geo: (  ");


 echo CHtml::encode($data->myDB_g_pcs."/");
 echo CHtml::encode($data->myDB_g_h  ."H= ");
 echo CHtml::encode($data->myDB_h_perc  .");"   );
 ?>
 </div>

