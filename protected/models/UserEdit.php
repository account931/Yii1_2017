<?php
//  DON'Y NEED  THIS  AT ALL  after  using  update()  instead  of  save();  Confirm ????
class UserEdit extends CActiveRecord
{

//captcha
public $verifyCode;


         public $repeatpassword; //causes  error  without  it ;


	/**
	 * The followings are the available columns in table 'tbl_user':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $salt
	 * @var string $email
	 * @var string $profile
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' email', 'required'), //  salt  was  dropped  as  now  is  genereted  automatically
			array('username, password, salt, email', 'length', 'max'=>128),
			array('profile', 'safe'),
                        //array('repeatpassword', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match!!!"),//  compare  2  passwords
                        //array('email', 'email','message'=>"The email isn't correct"), //  check if  E-mail is  correct
                       // array('username', 'unique','message'=>'User  already exists!Get off!!!'), // checks if  user is  already  exist in DB,+ check it controller (site/registration) manually
// Start only  Letters in Username
array( 'username',
       'match', 'not' => true, 'pattern' => '/[^a-zA-Z_-]/',
       'message' => 'Invalid characters in username.',),
// END only  Letters in Username


//captcha
 array('verifyCode', 'captcha',  /*authorized may not print  Captcha*/  /*'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),*/  ),
//END captcha


		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'posts' => array(self::HAS_MANY, 'Post', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'username' => 'Username',
			'password' => 'Password',
			'salt' => 'Salt',
			'email' => 'Email',
			'profile' => 'Profile',
                        'verifyCode' => 'Your  true  captcha',
		);
	}

	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->salt)===$this->password;
	}




	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
		return md5($salt.$password);
	}

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	protected function generateSalt()
	{
		return uniqid('',true);
	}

//just  the  copy of  "/protected function generateSalt()/" and  therefore  can  use it in view for  testing(as protected)
          public function generateSalt2()
	{
		return uniqid('',true);
	}




































