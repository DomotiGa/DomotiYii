<?php

/**
 * This is the model class for table "settings_plcbus".
 *
 * The followings are the available columns in table 'settings_plcbus':
 * @property integer $id
 * @property boolean $enabled
 * @property string $serialport
 * @property string $baudrate
 * @property integer $polltime
 * @property string $usercode
 * @property integer $threephase
 * @property string $housecodes
 * @property integer $ack
 * @property boolean $debug
 */
class SettingsPlcbus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsPlcbus the static model class
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
		return 'settings_plcbus';
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
			array('id, polltime, threephase, ack', 'numerical', 'integerOnly'=>true),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			array('baudrate, housecodes', 'length', 'max'=>32),
			array('serialport', 'length', 'max'=>128),
			array('usercode', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, serialport, baudrate, polltime, usercode, threephase, housecodes, ack, debug', 'safe', 'on'=>'search'),
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
			'enabled' => 'Enabled',
			'serialport' => 'Serialport',
			'baudrate' => 'Baudrate',
			'polltime' => 'Polltime',
			'usercode' => 'Usercode',
			'threephase' => 'Threephase',
			'housecodes' => 'Housecodes',
			'ack' => 'Ack',
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
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('baudrate',$this->baudrate,true);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('usercode',$this->usercode,true);
		$criteria->compare('threephase',$this->threephase);
		$criteria->compare('housecodes',$this->housecodes,true);
		$criteria->compare('ack',$this->ack);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
