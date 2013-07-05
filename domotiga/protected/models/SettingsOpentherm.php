<?php

/**
 * This is the model class for table "settings_opentherm".
 *
 * The followings are the available columns in table 'settings_opentherm':
 * @property integer $id
 * @property string $temperatureoverride
 * @property integer $syncclock
 * @property integer $outsidesensor
 * @property integer $enabled
 * @property string $serialport
 * @property integer $polltime
 * @property string $thermostat
 * @property integer $debug
 */
class SettingsOpentherm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsOpentherm the static model class
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
		return 'settings_opentherm';
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
			array('id, syncclock, outsidesensor, enabled, polltime, debug', 'numerical', 'integerOnly'=>true),
			array('temperatureoverride, serialport, thermostat', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, temperatureoverride, syncclock, outsidesensor, enabled, serialport, polltime, thermostat, debug', 'safe', 'on'=>'search'),
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
			'temperatureoverride' => 'Temperatureoverride',
			'syncclock' => 'Syncclock',
			'outsidesensor' => 'Outsidesensor',
			'enabled' => 'Enabled',
			'serialport' => 'Serialport',
			'polltime' => 'Polltime',
			'thermostat' => 'Thermostat',
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
		$criteria->compare('temperatureoverride',$this->temperatureoverride,true);
		$criteria->compare('syncclock',$this->syncclock);
		$criteria->compare('outsidesensor',$this->outsidesensor);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('thermostat',$this->thermostat,true);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}