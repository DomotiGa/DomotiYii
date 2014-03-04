<?php

/**
 * This is the model class for table "device_values_log".
 *
 * The followings are the available columns in table 'device_values_log':
 * @property integer $id
 * @property string $device_id
 * @property integer $valuenum
 * @property string $value
 * @property string $lastchanged
 */
class DeviceValuesLog extends CActiveRecord
{

	/**
	 * @return dropdownlist with the list of device
	 */
	public function getDevices()
	{
	    return CHtml::listData(Devices::model()->findAll(), 'id', 'name');
	}

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
		return 'device_values_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('device_id, valuenum, value', 'required'),
			array('device_id, valuenum', 'length', 'max'=>11),
			array('value', 'length', 'max'=>32),
			array('lastchanged', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, device_id, valuenum, value, lastchanged', 'safe', 'on'=>'search'),
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
                	'device' => array(self::BELONGS_TO, 'Devices', 'device_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'device_id' => 'Device number',
			'valuenum' => 'Value number',
			'value' => 'Value',
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
		$criteria->compare('device_id',$this->device_id,true);
		$criteria->compare('valuenum',$this->valuenum,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('lastchanged',$this->lastchanged,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                  'pagination' => array(
                  'pageSize'=>Yii::app()->params['pagesizeDevices'],
                  'pageVar'=>'page'
             ),

		));
	}
}
