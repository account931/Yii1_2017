<?php

class SiteController extends Controller
{

   public $defaultAction = 'myDBStart';



               // setting  layout , ot  was  column 1, and  that's  why  it  has  no  sibar  menu ;
	           public $layout='column2';
           //  was public $layout='column1';

    //CActiveRecord the currently loaded data model instance.
   private $_model; // Mine ,  would    work  without  variable  // for  myDBStart
   private $_model2;  //used for user updating;


// Variable  for  second  menu (declared in view )
 public  $MineMenu=array();


	/***********************************
	 * Declares class-based actions.
	 */
       
      // Commented  as  it  is  used  below
	
        public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


	/*************************************************
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}









// adding  my  page, it is  just test adding page  from menu, dos not  contain usefull  INFO;
// **************************************************************************************
// **************************************************************************************
// **                                                                                  **     
//it  works -1.)added  an <a  hreg>array  element  in views-layouts and  defined there as site/addmine(calling  action addmine in  site Controller )
// +2.0 creating  an acion actionmyadd() in site Controller;+  3.)  Not  done  yet =change  the  content  of  action
/**
	 * Displays the contact page
	 */
	public function actionmyadd()
                                  
	{
                       //Start my rendering  FOR  LOGGED & unlogged!!!!!
      if(Yii::app()->user->isGuest) {
                      $this->render('//site/pages/addmine'); }   //views/site/pages
         else {      
$this->render('addmeAuthorized',array('model'=>$model)); }
                       // End  my  rendering



		/*$model=new ContactForm; // change to  your  model!!!!!!
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));*/
	}
//end  adding  my  page-----------------------------------
// END function actionmyadd
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//













//CORE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// adding  my  myDBStart-Working  with my DB******************
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
      public function actionmyDBStart() {



   //Start my rendering  FOR  LOGGED & unlogged!!!!!
      if(Yii::app()->user->isGuest) {
                      $this->render('unlogged',array('model'=>$model, ));
                                    }   //views/site/pages
         else {      







                 //Model  for  INSERT(used  for  inserting inputs) (INSERTS into  NEW  STATS =tbl_myDBStart SQL table; auto calculate  STAT %);
                          $model=new MyDBStart; 
                 
                           //START  INSERT
                          //Saving  inputs from  form with $model (INSERT!!!!);
                 if(isset($_POST['MyDBStart']))   // S_POST must contain  Model original name???-Yes, Model Name
		       {

                       
                        // if G  or  V input  exists(+checks if v_pcs input exists, than v_h  should  exist  too(to  avoid  devision by  zero) )
                         if( !empty($_POST['MyDBStart']['myDB_v_pcs']) &&  !empty($_POST['MyDBStart']['myDB_v_h'])   || !empty($_POST['MyDBStart']['myDB_g_pcs'])  &&  !empty($_POST['MyDBStart']['myDB_g_h'])   )
                           { 
			    $model->attributes=$_POST['MyDBStart'];




//setting  my Calculation for  V;
if ( !empty($_POST['MyDBStart']['myDB_v_pcs'])  ){
                 $v_pcs=$_POST['MyDBStart']['myDB_v_pcs']/($_POST['MyDBStart']['myDB_v_h']*44)*100; 
                 $v_pcs=round($v_pcs, 2); //round  to  2 digits;
                 $v_pcs=$v_pcs."%" ;
                 $model->myDB_v_perc=$v_pcs;
                                          }
// end  setting  my  Calculation for  V;



//setting  my Calculation for  G;
if (!empty($_POST['MyDBStart']['myDB_g_pcs'])){
               $v_pcsG=$_POST['MyDBStart']['myDB_g_pcs']/($_POST['MyDBStart']['myDB_g_h']*30)*100;   
                 $v_pcsG=round($v_pcsG, 2); //round  to  2 digits;
                 $v_pcsG=$v_pcsG."%" ;
                 $model->myDB_h_perc=$v_pcsG;//the  field  for  G% in SQL  was  wronly  named, dunno  change  the  model;
                                           }
// end  setting  my  Calculation for  G;



//setting  IP & USER;
$model->myDB_user=Yii::app()->user->name;
$model->myDB_ip=$_SERVER['REMOTE_ADDR'];


                        $model->save();
                        
}//  end  if(isset($_POST['MyDBStart']['myDB_v_pcs'],$_POST['MyDBStart']['myDB_g_pcs'])){ // if G  or  V input  exists

                        if( $model->save()){
                        Yii::app()->user->setFlash('success', "New Data Log is Inserted & Saved!!! Ven = $v_pcs , Geo = $v_pcsG ");
                        //$this->redirect(array('myDBStart','param1'=>'val1')); //  call action;
                          $model->myDB_v_pcs="";$model->myDB_v_h=""; $model->myDB_g_pcs="";$model->myDB_g_h="";//  clearing  the  fields after saving ;
                          //MyDBStart::model()->unsetAttributes(); $model=new MyDBStart;// not  working
                            $this->refresh();//  Works!!!Prevent from sending   form on the  reload of  page
}
                        

			/*if( $model->save()){ 
                              $this->redirect(array('view','id'=>$model->id));
                                         }*/
		}

		/*$this->render('create',array(
			'model'=>$model,
		));*/
// END INSERT----------------------------------------------------------------------------------------------





//START AR*********************************************************************
                 //Model  for  SELECT  from  Database with  AR (passed in $this->render())
                   $Criteria = new CDbCriteria; 
                   $Criteria->select='*';
                   $Criteria->order = 'myDB_id DESC';
                   $Criteria->limit='7';
                   $Criteria->condition = "myDB_user = :bla_bla";
                   $Criteria->params=(array(':bla_bla'=>Yii::app()->user->name));// was  'dima'
                   $modelSelect2=MyDBStart::model()->findAll($Criteria);
//END AR----------------------------------------------------------------------






//START CActiveDataProvide (used   in CDetailView ONLY))**********************************************************************
                  // SELECT 2 (getting  results  from  DB  using CActiveDataProvide +widget )  NOT IMPLEMENTED 
                     //$criteriaXL=new CDbCriteria(array(  ));   //'select'=>'*' 
                      $criteriaXL=new CDbCriteria;
                      $criteriaXL->select='*';
                      $criteriaXL->order = 'myDB_id DESC';
                      $criteriaXL->condition = "myDB_user = :bla_bla";
                      $criteriaXL->params=(array(':bla_bla'=>Yii::app()->user->name));
                      
                      $dataProvider=new CActiveDataProvider('MyDBStart',array('criteria'=>$criteriaXL,
                                                                              'pagination'=>array('pageSize'=>5), // Display 5  per page
                                                                                
                                                                               ));
//END CActiveDataProvide----------------------------------------------------------------------












// CONFIRM DELETE???????????
//START CActiveDataProvide22 (used in OLD (before new Stat )CGridView ONLY(i.e Admin panel ))**********************************************************************
                  // SELECT 2 (getting  results  from  DB  using CActiveDataProvide +widget )  NOT IMPLEMENTED 
                      $criteriaXLGrid=new CDbCriteria;
                      $criteriaXLGrid->select='*';
                      //$criteriaXLGrid->limit='4';
                      //$criteriaXLGrid->order = 'myDB_id DESC';
                     

                      
                      $dataProviderGrid=new CActiveDataProvider('MyDBStart',array('criteria'=>$criteriaXLGrid,
                                                                              //'pagination'=>array('pageSize'=>5), // Display 5  per page
                                                                              //'sort'=>array("defaultOrder"=>"myDB_id DESC")   //Works,just  deactivated for OLD GRIDVIEW//  trying  to  set  defaul DESC (in cGridView only,as CDetailView sets  DESC by ' $criteriaXL->order = 'myDB_id DESC' );
                                                                               ));
//END CActiveDataProvide22 (used in CGridView ONLY)----------------------------------------------------------------------










// NEW CGridView!!!!!!!!!!!!!!!!!!!!!!!!
//START CActiveDataProvide44 (used in NEW Stat )CGridView (i.e Admin panel ))**********************************************************************
                      $criteriaGridNewStat=new CDbCriteria;
                      $criteriaGridNewStat->select='*';
                      //$criteriaGridNewStat->order = 'myDB_id DESC';
                      $criteriaGridNewStat->condition = "myDB_user = :bla_bla";
                      $criteriaGridNewStat->params=(array(':bla_bla'=>Yii::app()->user->name));
                      
                      $dataProviderGridNewStat=new CActiveDataProvider('MyDBStart',array('criteria'=>$criteriaGridNewStat,
                                                                              //'pagination'=>array('pageSize'=>5), // Display 5  per page
                                                                              'sort'=>array("defaultOrder"=>"myDB_id DESC")  //  trying  to  set  defaul DESC (in cGridView only,as CDetailView sets  DESC by ' $criteriaXL->order = 'myDB_id DESC' );
                                                                               ));
//END CActiveDataProvide44 (used in new Stat )CGridView ----------------------------------------------------------------------






      // mine=> FINAL  RENDERING!!!!!!!!!!!!!!!!!! //May  erase $dataProviderGrid as it is  not  used  here(was old CGridView)
       $this->render('myDBStart',  array('model'=>$model,'modelSelect2'=>$modelSelect2 ,'dataProvider'=>$dataProvider, 'dataProviderGrid'=>$dataProviderGrid,'dataProviderGridNewStat'=>$dataProviderGridNewStat) );  
              //above=$model(for INSERT), $modelSelect2(for AR SELECT),$dataProvider(for CDetailView), $dataProviderGrid(for CGridView (Old GridView)),$dataProviderGridNewStat(New GridView Stats);
}//  END //Start my rendering  FOR  LOGGED & unlogged!!!!!

    }
// END function actionmyDBStart()
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//












// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
  
//Delete Action  START (can  delete  any ) *************************
	 //Deletes a particular model.
	 //If deletion is successful, the browser will be redirected to the 'index' page.
	 
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();
                        Yii::app()->user->setFlash('success', "Delete  is  completed ");

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
                                Yii::app()->user->setFlash('success', "Delete  is  completed ");
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
//End  delete ------------------------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//










// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
  
//START   Update (editing  the Ven, Geo  input )*****************
public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['MyDBStart']))
		{

//INJECTED
   if(!empty($_POST['MyDBStart']['myDB_v_pcs'])||!empty($_POST['MyDBStart']['myDB_g_pcs'])){ // if G  or  V input  exists
			    $model->attributes=$_POST['MyDBStart'];




//setting  my Calculation for  V;
if (!empty($_POST['MyDBStart']['myDB_v_pcs'])){
                 $v_pcs=$_POST['MyDBStart']['myDB_v_pcs']/($_POST['MyDBStart']['myDB_v_h']*44)*100; 
                 $v_pcs=round($v_pcs, 2); //round  to  2 digits;
                 $v_pcs=$v_pcs."%" ;
                 $model->myDB_v_perc=$v_pcs;
                                          }
// end  setting  my  Calculation for  V;



//setting  my Calculation for  G;
if (!empty($_POST['MyDBStart']['myDB_g_pcs'])){
                 $v_pcsG=$_POST['MyDBStart']['myDB_g_pcs']/($_POST['MyDBStart']['myDB_g_h']*30)*100;
                 $v_pcsG=round($v_pcsG, 2); //round  to  2 digits;
                 $v_pcsG=$v_pcsG."%" ;
                 $model->myDB_h_perc=$v_pcsG;//the  field  for  G% in SQL  was  wronly  named, dunno  change  the  model;
                                           } 
                                             }
// end  setting  my  Calculation for  G;
// END  INJECTED


			$model->attributes=$_POST['MyDBStart'];
			if($model->save()){
                          Yii::app()->user->setFlash('success', "Updated successfully.Ven = $v_pcs , Geo = $v_pcsG");
                                 $this->redirect(array('/site/myDBStart')); // REDIRECT
				//$this->redirect(array('myDBStart','model'=>$model)); //  this works, but  causes  error flash;
                                //$this->render('view',array('model'=>$model,)); //WAS LAST VARIANT-opens  1 it  view  //!!!!!!!can  render myDBStart
                                           }//  end if($model->save())


		}

		$this->render('update',array(   /*update*/
			'model'=>$model,
		));
	}
//END UPDATE (editing  the Ven, Geo  input )----------------------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//








//Update  User  Profile   //  uses  it's own loadModelUser (load)
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
public function actionUpdateEditProfile(){

        $model=$this->loadModelUser();
		if(isset($_POST['User']))  //  model  created  specially  for  Editting (dropped  required  fields) // can not  use  if(isset($_POST['UserEdit']))???
		{



			$model->attributes=$_POST['User'];   // can not  use  if(isset($_POST['UserEdit']))???
			if($model->save() /*update(),save(false)*/   ){   //  use  FALSE otherwise  it  makes all regist ,fields  required;
                          Yii::app()->user->setFlash('success', "Updated successfully");
				//$this->redirect(array('view','id'=>$model->id)); //  this works, but  causes  error flash;

                                 $this->redirect(array('/site/myInfo')); // REDIRECT
                                //$this->render('myInfo_Core',array('model'=>$model,)); // 
                                           }//  end if($model->save())


		} else{  //ELSE hepled  not  display after  Upadate/Save both  view/myInfo_Core & view/UserProfileUpdateForm triggered  by UserProfileUpdateForm action  from below


$this->render('UserProfileUpdateForm',array(
			'model'=>$model, ));
                }

}
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  UpdateEditProfile
















// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
  
//START VIEW a  single  entry (from CGRidView or  can be  implemeneted  from  anywhere  with  < a href>) ****************************
//Displays a particular model
	public function actionView()
	{
		$post=$this->loadModel();
		//$comment=$this->newComment($post);

		$this->render('view',array(
			'model'=>$post,
			/*'comment'=>$comment,*/
		));
	}
//  END  VIEW a  single  entry (from CGRidView) ----------------------------------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//








// **************************************************************************************
// **************************************************************************************
//                                                                                     **
//Load Model (used for  VIEW,DELETE,UPDATE)(but  ONLY FOR MyDBStart MODEL!!!!!!!!!!!!!!!!!!!)
/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				                     /*if(Yii::app()->user->isGuest)
					                 $condition='status='.Post::STATUS_PUBLISHED.' OR status='.Post::STATUS_ARCHIVED;
				                     else*/

					$condition='';
				$this->_model=MyDBStart::model()->findByPk($_GET['id'], $condition);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
//End Load Model---------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//








// **************************************************************************************
// **************************************************************************************
//                                                                                     **
//Load Model2 (used for  VIEW,DELETE,UPDATE for  USER MODEL only!!!!!!!!)

	public function loadModelUser()
	{
		if($this->_model2===null)
		{
			if(isset($_GET['id']))
			{
				                     

					$condition='';
				$this->_model2=User::model()->findByPk($_GET['id'], $condition); // can not  use   $this->_model2=UserEdit::model ?????
			}
			if($this->_model2===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model2;
	}
//End Load Model 2---------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//











//REGISTRAION of  New  Users  //it  works  but  have  to  add  hashing  and  salt
// **************************************************************************************
// **************************************************************************************
//                                                                                     **

public function actionregistration(){

//return md5($salt.$password);//  salt  is  sored  in DB  without md5

                            $model=new User; 
                 
                           //START  INSERT
                          //Saving  inputs from  registration Form;
                      if(isset($_POST['User']))   // S_POST must contain  Model original name
		       {
  


// check  if  USERNAME  EXISTS , can be substituted  in model rules (array('username', 'unique','message'=>'User  already exists!'))
$userQQ=$_POST['User']['username'];
//If input  is  empty
$userQQ=stripslashes(trim($userQQ));
if( empty($userQQ) ) {Yii::app()->user->setFlash('success', "No Name was  printed");} else {
                $user=User::model()->find('LOWER(username)=?',array(strtolower($userQQ)));
       		if($user!==null)  //if($user!===null)
                {Yii::app()->user->setFlash('success', "User already  exists!!! Try other  name");
                 $model->addError('attrib', 'Error added in Controller: attrib must be true.'); // Not  working;
                 } else 
		{Yii::app()->user->setFlash('success', "Name is available!");  }  //  move  this  figure  to  the  end  in Production
  } // End of  ELSE PART of "if(empty($userQQ) ";        
//end  check  original


  




 
			$model->attributes=$_POST['User'];  


//Adding  VAlidate  check   
                       if($model->validate()) {

                     
                  
                                                               
                                                              // save  password  separatly,  salt  goes as  a  User  wrote  it ;
                                                                 // getting  pass & salt  manually(the  trick  was to use multi-level Array {$_POST['User']['password'];} );
                                                                 $password1=$_POST['User']['password']; $salt1=$model->generateSalt2();//salt  is  auto  generated  //$_POST['User']['salt'];// manual salt input  
                                                                 $passFinal=$model->hashPassword($password1,$salt1);
                                                                 $model->salt=$salt1; // saving  generated  SALT(not manual  input);
                                                                 $model->password=$passFinal; //  Saving  hashed  password;

                                                              // hashing  the  compared password (without it  caused  "Passwords  dosn't  match")
                                                               $password2=$_POST['User']['repeatpassword']; $_POST['User']['repeatpassword']=$model->hashPassword($password2,$salt1);
                                                               $model->repeatpassword=$passFinal=$_POST['User']['repeatpassword']; 
                            
                                                                 $model->save();
 //  Start  setting  the  flash                                                                
if($model->save())
       { 
        Yii::app()->user->setFlash('success', "Your Profile is  created ! <a href='login'> Login</a>  ");    //echo CHtml::link('Link Text',array('controller/action'));
        //$this->redirect(array('/site/login')); // This  works  but  redirect  immediatly and  u don't see the  flash
       }
// End  Setting  the  flash





  //  was  trying  to resave  after  to  avoid  compare  password  failing
 /*$model->password=$passFinal; //  Saving  hashed  password
  $model->save();*/

} // End  VAlidate  check;
} //  END   if(isset($_POST['User']))


                        // This  caused  red  blocking
                        /*if( $model->save()){
                        Yii::app()->user->setFlash('tipDay','SAVED');
                        $this->redirect(array('myDBStart','param1'=>'val1')); //  call action;
                                            }*/

//render
$this->render('registration_form',array(
			'model'=>$model, ));	

}
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END REGISTRAION of  New  Users
































//Start myInfo  Action / User Pfofile  with Edit
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
public function actionmyInfo(){



//START AR*********************************************************************
                 //Model  for  SELECT  from  Database with  AR (passed in $this->render())
                   $Criteria = new CDbCriteria; 
                   $Criteria->select='*';
                   //$Criteria->order = 'myDB_id DESC';
                   //$Criteria->limit='7';
                   $Criteria->condition = "username = :bla_bla"; // username -a  DB  column;
                   $Criteria->params=(array(':bla_bla'=>Yii::app()->user->name));
                   $modelUserX=User::model()->findAll($Criteria);
//END AR----------------------------------------------------------------------


$this->render('myInfo_Core',array(
			'modelUserX'=>$modelUserX, ));

}
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  myInfo  Action








//Start Admin  Action
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
public function actionAdmin(){




    $role=Yii::app()->user->getState('roleX') ;  // Getting  User's  role (1 or  2)
    $roleC="1"; //Value  for  User's  access, 2 is  an Admin Value  ,  1-is  a User
    $roleA="2"; //  value  for  admin
    if ( strcmp ( $role, $roleC) == 0  )    //  simple  comparison (if($roleC=='1')) -causes  error  crashing;
        { $this->render('adminFalse',array('model'=>$model, )); 
                             }



// if Admin (i.e $roleA="2";)
else if ( strcmp ( $role, $roleA) == 0  ) {


//
// Admin GridView
//START Admin CActiveDataProvide (used in Admin (All  Users  records) 
                      $criteriaGridAdmin2=new CDbCriteria;
                      $criteriaGridAdmin2->select='*';
                      //$criteriaGridAdmin2->order = 'myDB_id DESC';
                     
                       $dataProviderGridAdmin2=new CActiveDataProvider('MyDBStart',array('criteria'=>$criteriaGridAdmin2,
                                                                              //'pagination'=>array('pageSize'=>5), // Display 5  per page
                                                                              'sort'=>array("defaultOrder"=>"myDB_id DESC")  //  trying  to  set  defaul DESC (in cGridView only,as CDetailView sets  DESC by ' $criteriaXL->order = 'myDB_id DESC' );
                                                                               ));
//END //START Admin CActiveDataProvide (used in Admin (All  Users  records)  ----------------------------------------------------------------------





$this->render('admin',array(
			'model'=>$model,'dataProviderGridAdmin2'=>$dataProviderGridAdmin2));  //  so  far ['model'=>$model]  is  not  used,will wokr if  it is  erased

 } //if Admin (i.e $roleA="2";)


// Any  other  cases(User is a  Guest), do  the  same  ,like  with  User
else { $this->render('adminFalse',array('model'=>$model, )); }

}
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  Admin Action












//Start CAlc
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
public function actionCalc(){










$this->render('Calc',array('model'=>$model, ));

}
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  Calc





//Start SplitCoords
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
public function actionSplitCoords(){




$this->render('SplitCoordsView',array('model'=>$model, ));

}
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  SplitCoords











	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}





























//  END

}