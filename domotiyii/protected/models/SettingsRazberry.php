<?php

/**
 * This is the model class for table "settings_razberry".
 *
 * The followings are the available columns in table 'settings_razberry':
 * @property integer $id
 * @property boolean $enabled
 * @property string $tcphost
 * @property integer $tcpport
 * @property string $username
 * @property string $password
 * @property integer $polltime
 * @property boolean $debug
 */
class SettingsRazberry extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings_razberry';
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
			array('id, tcpport, polltime', 'numerical', 'integerOnly'=>true),
			array('tcphost', 'length', 'max'=>32),
			array('username, password', 'length', 'max'=>64),
			array('enabled, debug', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, enabled, tcphost, tcpport, username, password, polltime, debug', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'polltime' => 'Poll Interval',
			'debug' => 'Debug',
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
		$criteria->compare('tcphost',$this->tcphost,true);
		$criteria->compare('tcpport',$this->tcpport);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SettingsRazberry the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
