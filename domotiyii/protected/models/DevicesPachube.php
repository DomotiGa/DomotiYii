<?php

/**
 * This is the model class for table "devices_pachube".
 *
 * The followings are the available columns in table 'devices_pachube':
 * @property string $id
 * @property string $datastreamid
 * @property string $tags
 * @property string $devicename
 * @property integer $deviceid
 * @property string $devicelabel
 * @property string $devicelabelshort
 * @property string $units
 * @property string $unittype
 * @property string $value
 */
class DevicesPachube extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'devices_pachube';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deviceid', 'numerical', 'integerOnly'=>true),
			array('datastreamid, devicelabelshort', 'length', 'max'=>8),
			array('tags, devicename, units', 'length', 'max'=>32),
			array('devicelabel, unittype', 'length', 'max'=>16),
			array('value', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, datastreamid, tags, devicename, deviceid, devicelabel, devicelabelshort, units, unittype, value', 'safe', 'on'=>'search'),
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
			'datastreamid' => 'Datastreamid',
			'tags' => 'Tags',
			'devicename' => 'Devicename',
			'deviceid' => 'Deviceid',
			'devicelabel' => 'Devicelabel',
			'devicelabelshort' => 'Devicelabelshort',
			'units' => 'Units',
			'unittype' => 'Unittype',
			'value' => 'Value',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('datastreamid',$this->datastreamid,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('devicename',$this->devicename,true);
		$criteria->compare('deviceid',$this->deviceid);
		$criteria->compare('devicelabel',$this->devicelabel,true);
		$criteria->compare('devicelabelshort',$this->devicelabelshort,true);
		$criteria->compare('units',$this->units,true);
		$criteria->compare('unittype',$this->unittype,true);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DevicesPachube the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
