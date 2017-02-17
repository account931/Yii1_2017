<?php
//display and load breadcums value for   this  view.Widget by itself is declared with  $this->breadcrumb array  for  items  ('items'=>$this->MineMenu)
/*$this->breadcrumbs=array(
	'Z',
);*/


//Temporary disable the  2nd  menu 
// Menu  for  this  page ,  decalred  in view-main.php  as a  menu  without items (itemas  as  an  array  set  in  this  view;)
/*$this->MineMenu =array(
array('label'=>'DB_AboutXX', 'url'=>array('site/page', 'view'=>'about')),
array('label'=>'DB_AboutZZ', 'url'=>array('site/page', 'view'=>'about')),  );*/
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









<div  class="myInfo_Core " style="">   
<img  src="http://www.freeiconspng.com/uploads/-profile-edit-account-edit-profile-edit-user-sign-icon--icon-32.png"/>
<?php


//-----------------------------------USER INFO  (get with UserIdentity component )
   echo "</br>";
   echo CHtml::encode("Hello, ".Yii::app()->user->name);
   echo "</br>Your  Id is => ".CHtml::encode(Yii::app()->user->id); 
   echo "</br>Your  Email ( UsIndentity) :   => ".CHtml::encode(Yii::app()->user->email); // set in UserIdentity.php
   echo "</br>Salt is => ".CHtml::encode(Yii::app()->user->salt); 




//-------User details  with AR
 foreach ($modelUserX as $ua)   { 
echo "</br>Email (AR): ".$ua->email;
echo "</br>Language : ".$ua->language; }
//----- END User details  with AR




    //  Get  if  admin or  user with UserIndentity;
    $role=Yii::app()->user->roleX; $roleC="2"; // 2 is  an Admin Value   
    if ( strcmp ( $role, $roleC) == 0  ){$roleX="Admin";}else{$roleX="Just  a  User";} //  for  some  bizzare  reason simple  comparison is not  working;
     echo "</br>Access => ".CHtml::encode("$roleX"); 
        //  if  u are  Admin;
       if ($roleX=="Admin")   {echo "</br> ADMIN Classified  Link"; echo"</br><img  src='http://findicons.com/files/icons/2715/community_icons_and_forum_rank_icons/256/admin.png'/>";} // some  action  for  Admin only;
        //  END  if  u  are  Admin;


echo "</br></br>";



 //My Yii link  for  Editing;
//  TO MAKE IT WORKING-REWRITE NEW UPDATE()+LOADMODEL() -withh USER MODel;
   echo CHtml::link('Edit  Your  profile!!',array('/site/UpdateEditProfile?id='.Yii::app()->user->id));   //action name can be either capital or  not;                                  
?>

</div>



<!--<img  src="https://www.recruitguelph.ca/cecs/sites/recruitguelph.ca.cecs/files/images/what's-your-profile_1.jpg" style="width:400px;"/>-->





<!-------------------------------------------STart Form   for  Uploading---------------------------------------------------->
</br></br>
<!--<div class="form" style="clear:both;">
<h1>Form</h1>
<h2>Form</h1>
<h3>Form</h1>
</div>-->
<!-------------------------------------------END   Form   for  Uploading---------------------------------------------------->


