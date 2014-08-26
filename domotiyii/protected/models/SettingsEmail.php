<?php

/**
 * This is the model class for table "settings_email".
 *
 * The followings are the available columns in table 'settings_email':
 * @property integer $id
 * @property boolean $enabled
 * @property string $fromaddress
 * @property string $toaddress
 * @property string $smtpserver
 * @property integer $smtpport
 * @property boolean $sslenabled
 * @property string $username
 * @property string $password
 * @property boolean $debug
 */
class SettingsEmail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsEmail the static model class
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
		return 'settings_email';
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
			array('id, smtpport', 'numerical', 'integerOnly'=>true),
			array('enabled, debug, sslenabled', 'boolean', 'trueValue'=>-1),
			array('fromaddress, toaddress, smtpserver, username, password', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, fromaddress, toaddress, smtpserver, smtpport, debug', 'safe', 'on'=>'search'),
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
			'fromaddress' => 'From address',
			'toaddress' => 'To address',
			'smtpserver' => 'SMTP server',
			'smtpport' => 'SMTP port',
			'sslenabled' => 'TLS/SSL Enabled',
			'username' => 'Username',
			'password' => 'Password',
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
		$criteria->compare('fromaddress',$this->fromaddress,true);
		$criteria->compare('toaddress',$this->toaddress,true);
		$criteria->compare('smtpserver',$this->smtpserver,true);
		$criteria->compare('smtpport',$this->smtpport);
		$criteria->compare('sslenabled',$this->smtpport);
		$criteria->compare('username',$this->smtpport);
		$criteria->compare('password',$this->smtpport);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
