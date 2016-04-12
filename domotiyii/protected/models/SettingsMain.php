<?php

/**
 * This is the model class for table "settings_main".
 *
 * The followings are the available columns in table 'settings_main':
 * @property integer $id
 * @property integer $sleeptime
 * @property integer $flushtime
 * @property boolean $debug
 * @property integer $logbuffer
 * @property boolean $authentication
 * @property string $startpage
 * @property boolean $debugevents
 * @property boolean $debugdevices
 * @property boolean $debugenergy
 * @property string $hometoppanel
 * @property string $homeleftpanel
 * @property string $homerightpanel
 * @property string $homebottompanel
 * @property boolean $autodevicecreate
 * @property boolean $logallvalueupdates
 * @property string $logprefix
 */
class SettingsMain extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsMain the static model class
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
		return 'settings_main';
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
			array('id, sleeptime, flushtime, debug, logbuffer, authentication, debugevents, debugdevices, debugenergy, autodevicecreate', 'numerical', 'integerOnly'=>true),
			array('debug, authentication, debugevents, debugdevices, debugenergy, autodevicecreate, logallvalueupdates', 'numerical'),
			array('startpage', 'length', 'max'=>32),
			array('hometoppanel, homeleftpanel, homerightpanel, homebottompanel', 'length', 'max'=>256),
			array('logprefix', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sleeptime, flushtime, debug, logbuffer, authentication, startpage, debugevents, debugdevices, debugenergy, hometoppanel, homeleftpanel, homerightpanel, homebottompanel, autodevicecreate, logprefix, logallvalueupdates', 'safe', 'on'=>'search'),
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
			'sleeptime' => 'Sleeptime',
			'flushtime' => 'Flushtime',
			'debug' => 'Debug main',
			'logbuffer' => 'Logbuffer',
			'authentication' => 'Authentication',
			'startpage' => 'Startpage',
			'debugevents' => 'Debug events',
			'debugdevices' => 'Debug devices',
			'debugenergy' => 'Debug energy',
			'hometoppanel' => 'Hometoppanel',
			'homeleftpanel' => 'Homeleftpanel',
			'homerightpanel' => 'Homerightpanel',
			'homebottompanel' => 'Homebottompanel',
			'autodevicecreate' => 'Autocreate devices',
			'logallvalueupdates' => 'Log all valueupdates',
			'logprefix' => 'Logprefix',
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
		$criteria->compare('sleeptime',$this->sleeptime);
		$criteria->compare('flushtime',$this->flushtime);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('logbuffer',$this->logbuffer);
		$criteria->compare('authentication',$this->authentication);
		$criteria->compare('startpage',$this->startpage,true);
		$criteria->compare('debugevents',$this->debugevents);
		$criteria->compare('debugdevices',$this->debugdevices);
		$criteria->compare('debugenergy',$this->debugenergy);
		$criteria->compare('hometoppanel',$this->hometoppanel,true);
		$criteria->compare('homeleftpanel',$this->homeleftpanel,true);
		$criteria->compare('homerightpanel',$this->homerightpanel,true);
		$criteria->compare('homebottompanel',$this->homebottompanel,true);
		$criteria->compare('autodevicecreate',$this->autodevicecreate);
		$criteria->compare('logprefix',$this->logprefix,true);
		$criteria->compare('logallvalueupdates',$this->logallvalueupdates,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
