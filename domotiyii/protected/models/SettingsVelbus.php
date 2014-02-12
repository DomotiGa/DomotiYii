<?php

/**
 * This is the model class for table "settings_velbus".
 *
 * The followings are the available columns in table 'settings_velbus':
 * @property integer $id
 * @property boolean $enabled
 * @property string $serialport
 * @property string $tcphost
 * @property integer $tcpport
 * @property string $type
 * @property boolean $relayenabled
 * @property integer $relayport
 * @property boolean $debug
 * @property string $baudrate
 */
class SettingsVelbus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings_velbus';
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
			array('serialport, tcphost, type, baudrate', 'length', 'max'=>32),
			array('enabled, relayenabled, debug', 'boolean', 'trueValue'=>-1),
			array('enabled, relayenabled, debug', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, enabled, serialport, tcphost, tcpport, type, relayenabled, relayport, debug, baudrate', 'safe', 'on'=>'search'),
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
			'tcphost' => 'Tcphost',
			'tcpport' => 'Tcpport',
			'type' => 'Type',
			'relayenabled' => 'Relayenabled',
			'relayport' => 'Relayport',
			'debug' => 'Debug',
			'baudrate' => 'Baudrate',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('tcphost',$this->tcphost,true);
		$criteria->compare('tcpport',$this->tcpport);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('relayenabled',$this->relayenabled);
		$criteria->compare('relayport',$this->relayport);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('baudrate',$this->baudrate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SettingsVelbus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
