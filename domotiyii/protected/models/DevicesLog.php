<?php

/**
 * This is the model class for table "devices_log".
 *
 * The followings are the available columns in table 'devices_log':
 * @property integer $id
 * @property string $deviceid
 * @property string $value
 * @property string $value2
 * @property string $value3
 * @property string $value4
 * @property string $lastchanged
 */
class DevicesLog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DevicesLog the static model class
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
		return 'devices_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deviceid, value', 'required'),
			array('deviceid', 'length', 'max'=>11),
			array('value, value2, value3, value4', 'length', 'max'=>32),
			array('lastchanged', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, deviceid, value, value2, value3, value4, lastchanged', 'safe', 'on'=>'search'),
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
			'deviceid' => 'Deviceid',
			'value' => 'Value',
			'value2' => 'Value2',
			'value3' => 'Value3',
			'value4' => 'Value4',
			'lastchanged' => 'Lastchanged',
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
		$criteria->compare('deviceid',$this->deviceid,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('value2',$this->value2,true);
		$criteria->compare('value3',$this->value3,true);
		$criteria->compare('value4',$this->value4,true);
		$criteria->compare('lastchanged',$this->lastchanged,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}