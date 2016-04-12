<?php

/**
 * This is the model class for table "settings_mqtt".
 *
 * The followings are the available columns in table 'settings_mqtt':
 * @property integer $id
 * @property boolean $enabled
 * @property string $tcphost
 * @property integer $tcpport
 * @property string $clientname
 * @property string $username
 * @property string $password
 * @property string $pubtopic
 * @property string $subtopic
 * @property integer $heartbeat
 * @property boolean $retain
 * @property integer $qos
 * @property boolean $debug
 * @property boolean $enablepublish
 * @property boolean $enablesubscribe
 */
class SettingsMqtt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsMqtt the static model class
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
		return 'settings_mqtt';
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
			array('id, tcpport, heartbeat, qos', 'numerical', 'integerOnly'=>true),
			array('qos', 'numerical', 'integerOnly'=>true, 'min'=>0, 'max'=>2),
			array('clientname', 'length', 'max'=>23),
			array('tcphost', 'length', 'max'=>64),
			array('username, password', 'length', 'max'=>32),
			array('pubtopic, subtopic', 'length', 'max'=>256),
			array('enabled, retain, debug, enablepublish, enablesubscribe', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, tcphost, tcpport, username, password, pubtopic, subtopic, heartbeat, retain, qos, debug, enablepublish, enablesubscribe', 'safe', 'on'=>'search'),
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
			'clientname' => 'Client name',
			'username' => 'Username',
			'password' => 'Password',
			'pubtopic' => 'Publish topic',
			'subtopic' => 'Subscribe topic',
			'heartbeat' => 'Heartbeat',
			'retain' => 'Retain',
			'qos' => 'Qos',			
			'debug' => 'Debug',
			'enablesubscribe' => 'Subscribe',
			'enablepublish' => 'Publish',
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
		$criteria->compare('clientname',$this->clientname,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('pubtopic',$this->pubtopic,true);
		$criteria->compare('subtopic',$this->subtopic,true);
		$criteria->compare('heartbeat',$this->heartbeat);
		$criteria->compare('retain',$this->retain);
		$criteria->compare('qos',$this->qos,true);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('enablepublish',$this->enablepublish);
		$criteria->compare('enablesubscribe',$this->enablesubscribe);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
