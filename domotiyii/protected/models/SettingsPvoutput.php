<?php

/**
 * This is the model class for table "settings_pvoutput".
 *
 * The followings are the available columns in table 'settings_pvoutput':
 * @property integer $id
 * @property boolean $enabled
 * @property string $api
 * @property string $pvoutputid
 * @property integer $pushtime
 * @property boolean $debug
 * @property integer $deviceid
 * @property string $devicevalue
 * @property integer $usagedeviceid
 * @property string $usagedevicevalue
 * @property integer $tempdeviceid
 * @property string $tempdevicevalue
 */
class SettingsPvoutput extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsPvoutput the static model class
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
		return 'settings_pvoutput';
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
			array('id, pushtime, deviceid, usagedeviceid, tempdeviceid', 'numerical', 'integerOnly'=>true),
			array('api, pvoutputid', 'length', 'max'=>64),
			array('devicevalue, usagedevicevalue, tempdevicevalue', 'length', 'max'=>8),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, api, pvoutputid, pushtime, debug, deviceid, devicevalue, usagedeviceid, usagedevicevalue, tempdeviceid, tempdevicevalue', 'safe', 'on'=>'search'),
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
			'api' => 'API key',
			'pvoutputid' => 'Pvoutput Id',
			'pushtime' => 'Pushtime',
			'debug' => 'Debug',
			'deviceid' => 'Pvdevice Id',
			'devicevalue' => 'Pvdevice value',
			'usagedeviceid' => 'Usagedevice Id',
			'usagedevicevalue' => 'Usagedevice value',
			'tempdeviceid' => 'Tempdevice Id',
			'tempdevicevalue' => 'Tempdevice value',
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
		$criteria->compare('api',$this->api,true);
		$criteria->compare('pvoutputid',$this->pvoutputid,true);
		$criteria->compare('pushtime',$this->pushtime);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('deviceid',$this->deviceid);
		$criteria->compare('devicevalue',$this->devicevalue,true);
		$criteria->compare('usagedeviceid',$this->usagedeviceid);
		$criteria->compare('usagedevicevalue',$this->usagedevicevalue,true);
		$criteria->compare('tempdeviceid',$this->tempdeviceid);
		$criteria->compare('tempdevicevalue',$this->tempdevicevalue,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
