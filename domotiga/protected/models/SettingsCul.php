<?php

/**
 * This is the model class for table "settings_cul".
 *
 * The followings are the available columns in table 'settings_cul':
 * @property integer $id
 * @property integer $enabled
 * @property string $tcphost
 * @property string $tcpport
 * @property string $type
 * @property string $serialport
 * @property string $baudrate
 * @property integer $model
 * @property string $fhtid
 * @property integer $debug
 */
class SettingsCul extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsCul the static model class
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
		return 'settings_cul';
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
			array('id, enabled, model, debug', 'numerical', 'integerOnly'=>true),
			array('tcphost, tcpport, type, serialport, baudrate, fhtid', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, tcphost, tcpport, type, serialport, baudrate, model, fhtid, debug', 'safe', 'on'=>'search'),
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
			'tcphost' => 'Tcphost',
			'tcpport' => 'Tcpport',
			'type' => 'Type',
			'serialport' => 'Serialport',
			'baudrate' => 'Baudrate',
			'model' => 'Model',
			'fhtid' => 'Fhtid',
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
		$criteria->compare('tcphost',$this->tcphost,true);
		$criteria->compare('tcpport',$this->tcpport,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('baudrate',$this->baudrate,true);
		$criteria->compare('model',$this->model);
		$criteria->compare('fhtid',$this->fhtid,true);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}