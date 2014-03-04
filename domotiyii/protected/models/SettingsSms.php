<?php

/**
 * This is the model class for table "settings_sms".
 *
 * The followings are the available columns in table 'settings_sms':
 * @property integer $id
 * @property integer $polltime
 * @property boolean $enabled
 * @property string $serialport
 * @property string $baudrate
 * @property string $pin
 * @property string $servicecentre
 * @property string $contact
 * @property boolean $debug
 */
class SettingsSms extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsSms the static model class
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
		return 'settings_sms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, polltime', 'numerical', 'integerOnly'=>true),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			array('baudrate, pin, servicecentre, contact', 'length', 'max'=>32),
			array('serialport', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, polltime, enabled, serialport, baudrate, pin, servicecentre, contact, debug', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'polltime' => 'Polltime',
			'enabled' => 'Enabled',
			'serialport' => 'Serialport',
			'baudrate' => 'Baudrate',
			'pin' => 'Pin code',
			'servicecentre' => 'Service centre',
			'contact' => 'Contact',
			'debug' => 'Debug',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('baudrate',$this->baudrate,true);
		$criteria->compare('pin',$this->pin,true);
		$criteria->compare('servicecentre',$this->servicecentre,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
