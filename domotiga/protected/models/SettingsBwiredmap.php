<?php

/**
 * This is the model class for table "settings_bwiredmap".
 *
 * The followings are the available columns in table 'settings_bwiredmap':
 * @property integer $id
 * @property boolean $enabled
 * @property string $website
 * @property string $websitepicurl
 * @property string $title
 * @property string $city
 * @property string $user
 * @property string $password
 * @property string $screenname
 * @property string $gpslat
 * @property string $gpslong
 * @property integer $pushtime
 * @property boolean $debug
 */
class SettingsBwiredmap extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsBwiredmap the static model class
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
		return 'settings_bwiredmap';
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
			array('id, pushtime', 'numerical', 'integerOnly'=>true),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			array('website, websitepicurl, title, city, user, password, screenname, gpslat, gpslong', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, website, websitepicurl, title, city, user, password, screenname, gpslat, gpslong, pushtime, debug', 'safe', 'on'=>'search'),
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
			'website' => 'Website',
			'websitepicurl' => 'Website picurl',
			'title' => 'Title',
			'city' => 'City',
			'user' => 'User',
			'password' => 'Password',
			'screenname' => 'Screenname',
			'gpslat' => 'GPS latitude',
			'gpslong' => 'GPS longitude',
			'pushtime' => 'Pushtime',
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
		$criteria->compare('website',$this->website,true);
		$criteria->compare('websitepicurl',$this->websitepicurl,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('screenname',$this->screenname,true);
		$criteria->compare('gpslat',$this->gpslat,true);
		$criteria->compare('gpslong',$this->gpslong,true);
		$criteria->compare('pushtime',$this->pushtime);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
