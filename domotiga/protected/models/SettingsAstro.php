<?php

/**
 * This is the model class for table "settings_astro".
 *
 * The followings are the available columns in table 'settings_astro':
 * @property integer $id
 * @property string $latitude
 * @property string $longitude
 * @property integer $timezone
 * @property string $twilight
 * @property string $seasons
 * @property string $seasonstarts
 * @property boolean $debug
 * @property string $temperature
 * @property string $currency
 * @property boolean $dst
 */
class SettingsAstro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsAstro the static model class
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
		return 'settings_astro';
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
			array('id, timezone', 'numerical', 'integerOnly'=>true),
			array('debug, dst', 'boolean', 'trueValue'=>-1),
			array('latitude, longitude, twilight, seasons, seasonstarts', 'length', 'max'=>32),
			array('temperature, currency', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, latitude, longitude, timezone, twilight, seasons, seasonstarts, debug, temperature, currency, dst', 'safe', 'on'=>'search'),
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
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'timezone' => 'Timezone',
			'twilight' => 'Twilight',
			'seasons' => 'Seasons',
			'seasonstarts' => 'Season starts',
			'debug' => 'Debug',
			'temperature' => 'Temperature',
			'currency' => 'Currency',
			'dst' => 'Dst',
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
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('timezone',$this->timezone);
		$criteria->compare('twilight',$this->twilight,true);
		$criteria->compare('seasons',$this->seasons,true);
		$criteria->compare('seasonstarts',$this->seasonstarts,true);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('temperature',$this->temperature,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('dst',$this->dst);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
