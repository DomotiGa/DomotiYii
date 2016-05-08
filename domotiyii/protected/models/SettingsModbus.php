<?php

/**
 * This is the model class for table "settings_modbus".
 *
 * The followings are the available columns in table 'settings_modbus':
 * @property integer $id
 * @property boolean $enabled
 * @property string $modbustype
 * @property string $tcphost
 * @property integer $tcpport
 * @property string $type
 * @property string $serialport
 * @property string $baudrate
 * @property integer $stopbits
 * @property integer $databits
 * @property integer $parity
 * @property boolean $debug
 * @property integer $polltime
 */
class SettingsModbus extends CActiveRecord
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
		return 'settings_modbus';
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
			array('id, tcpport, stopbits, databits, parity, polltime', 'numerical', 'integerOnly'=>true),
			array('enabled, debug', 'numerical'),
			array('tcphost, modbustype, type, baudrate', 'length', 'max'=>32),
			array('serialport', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, tcphost, tcpport, type, serialport, baudrate, debug, databits, stopbits, parity, modbustype', 'safe', 'on'=>'search'),
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
			'tcphost' => 'TCP Host',
			'tcpport' => 'TCP Port',
			'type' => 'Type',
			'modbustype' => 'Modbus Type',
			'serialport' => 'Serial Port',
			'baudrate' => 'Baud Rate',
			'databits' => 'Data Bits',
			'stopbits' => 'Stop Bits',
			'parity' => 'Parity',
			'debug' => 'Debug',
			'polltime' => 'Poll Time',
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
		$criteria->compare('modbustype',$this->modbustype,true);
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('baudrate',$this->baudrate,true);
		$criteria->compare('databits',$this->databits,true);
		$criteria->compare('stopbits',$this->stopbits,true);
		$criteria->compare('parity',$this->parity,true);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('polltime',$this->polltime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
