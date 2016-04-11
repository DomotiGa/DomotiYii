<?php

/**
 * This is the model class for table "settings_digitemp".
 *
 * The followings are the available columns in table 'settings_digitemp':
 * @property integer $id
 * @property boolean $enabled
 * @property string $command
 * @property string $config
 * @property integer $polltime
 * @property integer $readtime
 * @property boolean $debug
 */
class SettingsDigitemp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsDigitemp the static model class
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
		return 'settings_digitemp';
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
			array('id, polltime, readtime', 'numerical', 'integerOnly'=>true),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			array('command, config', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, command, config, polltime, readtime, debug', 'safe', 'on'=>'search'),
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
			'enabled' => Yii::t('app','Enabled'),
			'command' => Yii::t('app','Command'),
			'config' => Yii::t('app','Config'),
			'polltime' => Yii::t('app','Poll Interval'),
			'readtime' => Yii::t('app','Read Time'),
			'debug' => Yii::t('app','Debug'),
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
		$criteria->compare('config',$this->config,true);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('readtime',$this->readtime);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
