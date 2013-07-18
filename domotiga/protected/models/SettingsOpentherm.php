<?php

/**
 * This is the model class for table "settings_opentherm".
 *
 * The followings are the available columns in table 'settings_opentherm':
 * @property integer $id
 * @property string $temperatureoverride
 * @property boolean $syncclock
 * @property boolean $enabled
 * @property string $serialport
 * @property integer $polltime
 * @property string $thermostat
 * @property string $tcphost
 * @property integer $tcpport
 * @property string $type
 * @property boolean $relayenabled
 * @property integer $relayport
 * @property boolean $debug
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
			array('id, polltime, tcpport, relayport', 'numerical', 'integerOnly'=>true),
			array('temperatureoverride, serialport, thermostat, tcphost, type', 'length', 'max'=>32),
			array('syncclock, enabled, relayenabled, debug', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, temperatureoverride, syncclock, enabled, serialport, polltime, thermostat, tcphost, tcpport, type, relayenabled, relayport, debug', 'safe', 'on'=>'search'),
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
			'syncclock' => 'Sync clock',
			'enabled' => 'Enabled',
			'serialport' => 'Serialport',
			'polltime' => 'Polltime',
			'thermostat' => 'Thermostat',
			'tcphost' => 'Tcphost',
			'tcpport' => 'Tcpport',
			'type' => 'Type',
			'relayenabled' => 'Relay enabled',
			'relayport' => 'Relayport',
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
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('thermostat',$this->thermostat,true);
		$criteria->compare('tcphost',$this->tcphost,true);
		$criteria->compare('tcpport',$this->tcpport);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('relayenabled',$this->relayenabled);
		$criteria->compare('relayport',$this->relayport);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
