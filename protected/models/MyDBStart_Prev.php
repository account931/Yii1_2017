<?php
// my model  , generated  for  testing
/**
 * This is the model class for table "{{myDBStart}}".
 *
 * The followings are the available columns in table '{{myDBStart}}':
 * @property integer $myDB_id
 * @property string $myDB_name
 * @property string $myDB_message
 * @property string $myDB_ip
 * @property string $myDB_date
 */
class MyDBStart extends CActiveRecord
{
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
			array('myDB_name,myDB_message', 'required'),
			array('myDB_name, myDB_message, myDB_ip', 'length', 'max'=>77),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('myDB_id, myDB_name, myDB_message, myDB_ip, myDB_date', 'safe', 'on'=>'search'),
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
			'myDB_name' => 'My Db Name(altered in Model)',
			'myDB_message' => 'My Db Message' //,
			//'myDB_ip' => 'My Db Ip',
			//'myDB_date' => 'Date',
                        
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

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}