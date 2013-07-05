<?php

/**
 * This is the model class for table "settings_x10cmd".
 *
 * The followings are the available columns in table 'settings_x10cmd':
 * @property integer $id
 * @property integer $enabled
 * @property string $command
 * @property integer $monitor
 * @property integer $globalx10
 * @property integer $type
 * @property integer $debug
 */
class SettingsX10cmd extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsX10cmd the static model class
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
		return 'settings_x10cmd';
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
			array('id, enabled, monitor, globalx10, type, debug', 'numerical', 'integerOnly'=>true),
			array('command', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, command, monitor, globalx10, type, debug', 'safe', 'on'=>'search'),
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
			'command' => 'Command',
			'monitor' => 'Monitor',
			'globalx10' => 'Globalx10',
			'type' => 'Type',
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
		$criteria->compare('command',$this->command,true);
		$criteria->compare('monitor',$this->monitor);
		$criteria->compare('globalx10',$this->globalx10);
		$criteria->compare('type',$this->type);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}