<?php

/**
 * This is the model class for table "settings_rfxcomtx".
 *
 * The followings are the available columns in table 'settings_rfxcomtx':
 * @property integer $id
 * @property boolean $enabled
 * @property string $tcphost
 * @property integer $tcpport
 * @property string $type
 * @property string $serialport
 * @property string $baudrate
 * @property boolean $relayenabled
 * @property boolean $handshake
 * @property integer $relayport
 * @property boolean $disablex10
 * @property boolean $enablearc
 * @property boolean $enableharrison
 * @property boolean $enablekoppla
 * @property boolean $rfxmitter
 * @property boolean $debug
 */
class SettingsRfxcomtx extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsRfxcomtx the static model class
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
		return 'settings_rfxcomtx';
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
			array('id, tcpport, relayport', 'numerical', 'integerOnly'=>true),
			array('enabled, relayenabled, handshake, disablex10, enablearc, enableharrison, enablekoppla, rfxmitter, debug', 'numerical'),
			array('tcphost, type, baudrate', 'length', 'max'=>32),
			array('serialport', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, tcphost, tcpport, type, serialport, baudrate, relayenabled, handshake, relayport, disablex10, enablearc, enableharrison, enablekoppla, rfxmitter, debug', 'safe', 'on'=>'search'),
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
			'serialport' => 'Serial Port',
			'baudrate' => 'Baud Rate',
			'relayenabled' => 'Relay enabled',
			'handshake' => 'Handshake',
			'relayport' => 'Relay Port',
			'disablex10' => 'Disable x10',
			'enablearc' => 'Enable arc',
			'enableharrison' => 'Enable harrison',
			'enablekoppla' => 'Enable koppla',
			'rfxmitter' => 'Rfxmitter',
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
		$criteria->compare('tcpport',$this->tcpport);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('baudrate',$this->baudrate,true);
		$criteria->compare('relayenabled',$this->relayenabled);
		$criteria->compare('handshake',$this->handshake);
		$criteria->compare('relayport',$this->relayport);
		$criteria->compare('disablex10',$this->disablex10);
		$criteria->compare('enablearc',$this->enablearc);
		$criteria->compare('enableharrison',$this->enableharrison);
		$criteria->compare('enablekoppla',$this->enablekoppla);
		$criteria->compare('rfxmitter',$this->rfxmitter);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
