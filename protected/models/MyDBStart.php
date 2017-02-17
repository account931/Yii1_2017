<?php

/**
 * This is the model class for table "{{myDBStart}}".
 *
 * The followings are the available columns in table '{{myDBStart}}':
 * @property integer $myDB_id
 * @property string $myDB_name
 * @property string $myDB_message
 * @property string $myDB_ip
 * @property string $myDB_date
 * @property string $myDB_user
 * @property integer $myDB_user_ID
 * @property string $myDB_user_date
 * @property integer $myDB_v_pcs
 * @property integer $myDB_v_h
 * @property double $myDB_v_perc
 * @property integer $myDB_g_pcs
 * @property integer $myDB_g_h
 * @property double $myDB_h_perc
 */
class MyDBStart extends CActiveRecord
{


          // Captcha
        // public $verifyCode;


	/**
	 * Returns the static model of the specified AR class.
	 * @return MyDBStart the static model class
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
		return '{{myDBStart}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('myDB_user_date', 'required',  'message'=>'Be careful "{attribute}"  is empty.',),
                        /*array('myDB_name, myDB_message, myDB_ip, myDB_date, myDB_user, myDB_user_ID, myDB_user_date, myDB_v_pcs, myDB_v_h, myDB_v_perc, myDB_g_pcs, myDB_g_h, myDB_h_perc', 'required',          ),*/
			array('myDB_user_ID, myDB_v_pcs, myDB_g_pcs', 'numerical', 'integerOnly'=>true),
			array('myDB_g_h,myDB_v_h', 'numerical'), //  allow  Hours  to  be  8.5 (cut  from IntegersOnly ); //  format array('f1,f2','value')
			array('myDB_name, myDB_message, myDB_ip, myDB_user, myDB_user_date', 'length', 'max'=>77),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('myDB_id, myDB_name, myDB_message, myDB_ip, myDB_date, myDB_user, myDB_user_ID, myDB_user_date, myDB_v_pcs, myDB_v_h, myDB_v_perc, myDB_g_pcs, myDB_g_h, myDB_h_perc', 'safe', 'on'=>'search'),




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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'myDB_id' => 'My Db',
			'myDB_name' => 'My Db Name',
			'myDB_message' => 'My Db Message',
			'myDB_ip' => 'My Db Ip',
			'myDB_date' => 'My Db Date',
			'myDB_user' => 'User',
			'myDB_user_ID' => 'My Db User',
			'myDB_user_date' => 'User Date',
			'myDB_v_pcs' => 'V Pcs',
			'myDB_v_h' => 'V H',
			'myDB_v_perc' => 'V %',
			'myDB_g_pcs' => 'G Pcs',
			'myDB_g_h' => 'G H',
			'myDB_h_perc' => 'G %',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('myDB_id',$this->myDB_id);
		$criteria->compare('myDB_name',$this->myDB_name,true);
		$criteria->compare('myDB_message',$this->myDB_message,true);
		$criteria->compare('myDB_ip',$this->myDB_ip,true);
		$criteria->compare('myDB_date',$this->myDB_date,true);
		$criteria->compare('myDB_user',$this->myDB_user,true);
		$criteria->compare('myDB_user_ID',$this->myDB_user_ID);
		$criteria->compare('myDB_user_date',$this->myDB_user_date,true);
		$criteria->compare('myDB_v_pcs',$this->myDB_v_pcs);
		$criteria->compare('myDB_v_h',$this->myDB_v_h);
		$criteria->compare('myDB_v_perc',$this->myDB_v_perc);
		$criteria->compare('myDB_g_pcs',$this->myDB_g_pcs);
		$criteria->compare('myDB_g_h',$this->myDB_g_h);
		$criteria->compare('myDB_h_perc',$this->myDB_h_perc);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}