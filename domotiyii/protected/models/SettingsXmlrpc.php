<?php

/**
 * This is the model class for table "settings_xmlrpc".
 *
 * The followings are the available columns in table 'settings_xmlrpc':
 * @property integer $id
 * @property boolean $enabled
 * @property integer $httpport
 * @property integer $maxconn
 * @property boolean $debug
 * @property integer $broadcastudp
 */
class SettingsXmlrpc extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsXmlrpc the static model class
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
		return 'settings_xmlrpc';
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
			array('id, httpport, maxconn', 'numerical', 'integerOnly'=>true),
			array('enabled, debug, broadcastudp', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, httpport, maxconn, debug, broadcastudp', 'safe', 'on'=>'search'),
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
			'httpport' => 'Xmlrpcport',
			'maxconn' => 'Maxconn',
			'debug' => 'Debug',
			'broadcastudp' => 'Broadcast UDP',
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
		$criteria->compare('httpport',$this->httpport);
		$criteria->compare('maxconn',$this->maxconn);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('broadcastudp',$this->broadcastudp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
