<?php

/**
 * This is the model class for table "devices_camera".
 *
 * The followings are the available columns in table 'devices_camera':
 * @property string $id
 * @property string $name
 * @property string $type
 * @property string $cmdoptions
 * @property string $viewstring
 * @property string $grabstring
 * @property string $ptztype
 * @property string $ptzbaseurl
 * @property string $description
 * @property integer $viscaaddress
 * @property string $username
 * @property string $passwd
 * @property integer $enabled
 */
class DevicesCamera extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DevicesCamera the static model class
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
		return 'devices_camera';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('viscaaddress, enabled', 'numerical', 'integerOnly'=>true),
			array('name, username, passwd', 'length', 'max'=>64),
			array('type, ptztype', 'length', 'max'=>32),
			array('description', 'length', 'max'=>128),
			array('cmdoptions, viewstring, grabstring, ptzbaseurl', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, cmdoptions, viewstring, grabstring, ptztype, ptzbaseurl, description, viscaaddress, username, passwd, enabled', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'type' => 'Type',
			'cmdoptions' => 'Cmdoptions',
			'viewstring' => 'Viewstring',
			'grabstring' => 'Grabstring',
			'ptztype' => 'Ptztype',
			'ptzbaseurl' => 'Ptzbaseurl',
			'description' => 'Description',
			'viscaaddress' => 'Viscaaddress',
			'username' => 'Username',
			'passwd' => 'Passwd',
			'enabled' => 'Enabled',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('cmdoptions',$this->cmdoptions,true);
		$criteria->compare('viewstring',$this->viewstring,true);
		$criteria->compare('grabstring',$this->grabstring,true);
		$criteria->compare('ptztype',$this->ptztype,true);
		$criteria->compare('ptzbaseurl',$this->ptzbaseurl,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('viscaaddress',$this->viscaaddress);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('passwd',$this->passwd,true);
		$criteria->compare('enabled',$this->enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}