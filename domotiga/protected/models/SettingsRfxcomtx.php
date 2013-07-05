<?php

/**
 * This is the model class for table "settings_rfxcomtx".
 *
 * The followings are the available columns in table 'settings_rfxcomtx':
 * @property integer $id
 * @property integer $enabled
 * @property string $tcphost
 * @property integer $tcpport
 * @property string $type
 * @property string $serialport
 * @property string $baudrate
 * @property integer $relayenabled
 * @property integer $handshake
 * @property integer $relayport
 * @property integer $disablex10
 * @property integer $enablearc
 * @property integer $enableharrison
 * @property integer $enablekoppla
 * @property integer $rfxmitter
 * @property integer $debug
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
			array('id, enabled, tcpport, relayenabled, handshake, relayport, disablex10, enablearc, enableharrison, enablekoppla, rfxmitter, debug', 'numerical', 'integerOnly'=>true),
			array('tcphost, type, serialport, baudrate', 'length', 'max'=>32),
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
			'tcphost' => 'Tcphost',
			'tcpport' => 'Tcpport',
			'type' => 'Type',
			'serialport' => 'Serialport',
			'baudrate' => 'Baudrate',
			'relayenabled' => 'Relayenabled',
			'handshake' => 'Handshake',
			'relayport' => 'Relayport',
			'disablex10' => 'Disablex10',
			'enablearc' => 'Enablearc',
			'enableharrison' => 'Enableharrison',
			'enablekoppla' => 'Enablekoppla',
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