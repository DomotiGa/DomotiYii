<?php

/**
 * This is the model class for table "settings_temperaturnu".
 *
 * The followings are the available columns in table 'settings_temperaturnu':
 * @property integer $id
 * @property boolean $enabled
 * @property string $city
 * @property string $apikey
 * @property integer $pushtime
 * @property boolean $debug
 * @property integer $deviceid
 * @property string $devicevalue
 */
class SettingsTemperaturnu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsTemperaturnu the static model class
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
		return 'settings_temperaturnu';
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
			array('id, pushtime, deviceid', 'numerical', 'integerOnly'=>true),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			array('city, apikey', 'length', 'max'=>64),
			array('devicevalue', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, city, apikey, pushtime, debug, deviceid, devicevalue', 'safe', 'on'=>'search'),
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
			'city' => 'City',
			'apikey' => 'API key',
			'pushtime' => 'Pushtime',
			'debug' => 'Debug',
			'deviceid' => 'Device',
			'devicevalue' => 'Value',
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
		$criteria->compare('city',$this->city,true);
		$criteria->compare('apikey',$this->apikey,true);
		$criteria->compare('pushtime',$this->pushtime);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('deviceid',$this->deviceid);
		$criteria->compare('devicevalue',$this->devicevalue,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
