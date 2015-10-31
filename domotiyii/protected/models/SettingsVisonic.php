<?php

/**
 * This is the model class for table "settings_visonic".
 *
 * The followings are the available columns in table 'settings_visonic':
 * @property integer $id
 * @property boolean $enabled
 * @property string $serialport
 * @property integer $type
 * @property string $mastercode
 * @property boolean $autosynctime
 * @property boolean $forcestandardmode
 * @property integer $motiontimeout
 * @property integer $sensorarmstatus
 * @property boolean $debug
 */
class SettingsVisonic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsVisonic the static model class
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
		return 'settings_visonic';
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
			array('id, type', 'numerical', 'integerOnly'=>true),
			array('serialport', 'length', 'max'=>128),
			array('mastercode', 'length', 'max'=>16),
			array('motiontimeout, sensorarmstatus', 'length', 'max'=>11),
			array('enabled, debug, autosynctime, forcestandardmode', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, serialport, type, mastercode, debug', 'safe', 'on'=>'search'),
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
			'serialport' => 'Serialport',
			'type' => 'Type',
			'mastercode' => 'Master code',
			'autosyncmode' => 'Auto sync time',
			'forcestandardmode' => 'Force standard mode',
			'motiontimeout' => 'Motion timeout',
			'sensorarmstatus' => 'Sensor ARM status',
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
		$criteria->compare('serialport',$this->serialport,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('mastercode',$this->mastercode,true);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
