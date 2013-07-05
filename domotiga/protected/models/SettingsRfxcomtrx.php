<?php

/**
 * This is the model class for table "settings_rfxcomtrx".
 *
 * The followings are the available columns in table 'settings_rfxcomtrx':
 * @property integer $id
 * @property integer $enabled
 * @property string $tcphost
 * @property integer $tcpport
 * @property string $type
 * @property string $serialport
 * @property string $baudrate
 * @property integer $debug
 * @property integer $relayenabled
 * @property integer $relayport
 * @property integer $globalx10
 * @property integer $oldaddrfmt
 */
class SettingsRfxcomtrx extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsRfxcomtrx the static model class
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
		return 'settings_rfxcomtrx';
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
			array('id, enabled, tcpport, debug, relayenabled, relayport, globalx10, oldaddrfmt', 'numerical', 'integerOnly'=>true),
			array('tcphost, type, serialport, baudrate', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, tcphost, tcpport, type, serialport, baudrate, debug, relayenabled, relayport, globalx10, oldaddrfmt', 'safe', 'on'=>'search'),
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
			'debug' => 'Debug',
			'relayenabled' => 'Relayenabled',
			'relayport' => 'Relayport',
			'globalx10' => 'Globalx10',
			'oldaddrfmt' => 'Oldaddrfmt',
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
		$criteria->compare('tcpport',$this->tcpport);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('baudrate',$this->baudrate,true);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('relayenabled',$this->relayenabled);
		$criteria->compare('relayport',$this->relayport);
		$criteria->compare('globalx10',$this->globalx10);
		$criteria->compare('oldaddrfmt',$this->oldaddrfmt);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}