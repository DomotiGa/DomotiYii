<?php

/**
 * This is the model class for table "settings_openzwave".
 *
 * The followings are the available columns in table 'settings_zwave':
 * @property integer $id
 * @property boolean $enabled
 * @property string $serialport
 * @property string $baudrate
 * @property boolean $reloadnodes
 * @property integer $polltime
 * @property boolean $debug
 * @property string $polltimesleeping
 * @property boolean $enablepollsleeping
 * @property boolean $enablepolllistening
 * @property string $polltimelistening
 * @property boolean $updateneighbor
 * @property boolean $enableupdateneighbor
 */
class SettingsOpenzwave extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsOpenzwave the static model class
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
		return 'settings_openzwave';
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
			array('id, polltime', 'numerical', 'integerOnly'=>true),
			array('reloadnodes, enablepollsleeping, enablepolllistening, enableupdateneighbor, enabled, debug', 'numerical'),
			array('baudrate', 'length', 'max'=>32),
			array('serialport', 'length', 'max'=>128),
			array('polltimesleeping, polltimelistening, updateneighbor', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, serialport, baudrate, reloadnodes, polltime, debug, polltimesleeping, enablepollsleeping, enablepolllistening, polltimelistening, updateneighbor, enableupdateneighbor', 'safe', 'on'=>'search'),
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
			'serialport' => 'Serial Port',
			'baudrate' => 'Baud Rate',
			'reloadnodes' => 'Reload nodes',
			'polltime' => 'Poll Interval',
			'debug' => 'Debug',
			'polltimesleeping' => 'Poll Interval sleeping',
			'enablepollsleeping' => 'Enable poll sleeping',
			'enablepolllistening' => 'Enable poll listening',
			'polltimelistening' => 'Poll Interval listening',
			'updateneighbor' => 'Update neighbor',
			'enableupdateneighbor' => 'Enable update neighbor',
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
		$criteria->compare('baudrate',$this->baudrate,true);
		$criteria->compare('reloadnodes',$this->reloadnodes);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('debug',$this->debug);
		$criteria->compare('polltimesleeping',$this->polltimesleeping,true);
		$criteria->compare('enablepollsleeping',$this->enablepollsleeping);
		$criteria->compare('enablepolllistening',$this->enablepolllistening);
		$criteria->compare('polltimelistening',$this->polltimelistening,true);
		$criteria->compare('updateneighbor',$this->updateneighbor,true);
		$criteria->compare('enableupdateneighbor',$this->enableupdateneighbor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
