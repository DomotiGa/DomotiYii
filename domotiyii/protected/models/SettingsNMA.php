<?php

/**
 * This is the model class for table "settings_nma".
 *
 * The followings are the available columns in table 'settings_nma':
 * @property integer $id
 * @property boolean $enabled
 * @property string $apikey
 * @property string $application
 * @property string $event
 * @property boolean $debug
 */
class SettingsNMA extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsNMA the static model class
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
		return 'settings_nma';
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
			array('id', 'numerical', 'integerOnly'=>true),
			array('apikey', 'length', 'max'=>64),
			array('application, event', 'length', 'max'=>32),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, apikey, application, event, debug', 'safe', 'on'=>'search'),
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
			'apikey' => 'NMA API key',
			'application' => 'Application',
			'event' => 'Event',
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
		$criteria->compare('apikey',$this->apikey,true);
		$criteria->compare('application',$this->application,true);
		$criteria->compare('event',$this->event,true);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
