<?php

/**
 * This is the model class for table "settings_buienradar".
 *
 * The followings are the available columns in table 'settings_buienradar':
 * @property integer $id
 * @property boolean $enabled
 * @property string $urlbuienradar
 * @property string $latitude
 * @property string $longitude
 * @property string $city
 * @property integer $polltime
 * @property integer $outputprecision
 * @property string $output
 * @property integer $devmaxvalue
 * @property integer $devtimevalue
 * @property boolean $debug
 */
class SettingsBuienradar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings_buienradar';
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
			array('id, polltime, outputprecision, devmaxvalue, devtimevalue', 'numerical', 'integerOnly'=>true),
			array('urlbuienradar, city', 'length', 'max'=>128),
			array('output', 'length', 'max'=>32),
			array('latitude, longitude', 'length', 'max'=>32),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, enabled, urlbuienradar, latitude, longitude, city, polltime, debug', 'safe', 'on'=>'search'),
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
			'urlbuienradar' => 'Base URL',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'city' => 'City',
			'outputprecision' => 'Output Precision',
			'output' => 'Output format',
			'devmaxvalue' => 'Number of value(s)',
			'devtimevalue' => 'Place of time value',
			'polltime' => 'Update frequency',
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
		$criteria->compare('urlbuienradar',$this->urlbuienradar,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('outputprecision',$this->outputprecision);
		$criteria->compare('output',$this->output);
		$criteria->compare('devmaxvalue',$this->devmaxvalue);
		$criteria->compare('devtimevalue',$this->devtimevalue);
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
	 * @return SettingsBuienradar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
