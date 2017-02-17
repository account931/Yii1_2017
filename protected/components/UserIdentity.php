<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id; private $_email;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=User::model()->find('LOWER(username)=?',array(strtolower($this->username)));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->id;
			$this->username=$user->username;
                                                  //  succefull attempt  to  get   email and  other  fields(may use in view="echo Yii::app()->user->email;");
                                                     $this->setState('email', $user->email); 
                                                     $this->setState('salt'  ,  $user->salt);
                                                     $this->setState('roleX'  , $user->roleX);//  get  the  User  Role (1(user) or  2(admin));
                                                  //  End  succefull attempt  to  get   email and  other  fields(
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode==self::ERROR_NONE;
	}


	// @return integer the ID of the user record
		public function getId()
	{
		return $this->_id;
	}


          //  we  don't  need  this  , may  be erased;
	// @return email of the user record
		/*public function getEmail()
	            { return $this->_email;}*/


}