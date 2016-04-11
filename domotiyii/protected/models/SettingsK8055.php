<?php

/**
 * This is the model class for table "settings_k8055".
 *
 * The followings are the available columns in table 'settings_k8055':
 * @property integer $id
 * @property boolean $enabled
 * @property integer $polltime
 * @property integer $boardaddress
 * @property integer $debouncetime1
 * @property integer $debouncetime2
 * @property boolean $debug
 */
class SettingsK8055 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsK8055 the static model class
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
		return 'settings_k8055';
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
			array('id, polltime, boardaddress, debouncetime1, debouncetime2', 'numerical', 'integerOnly'=>true),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, polltime, boardaddress, debouncetime1, debouncetime2, debug', 'safe', 'on'=>'search'),
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
			'polltime' => 'Poll Interval',
			'boardaddress' => 'Board address',
			'debouncetime1' => 'Debounce time1',
			'debouncetime2' => 'Debounce time2',
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
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('boardaddress',$this->boardaddress);
		$criteria->compare('debouncetime1',$this->debouncetime1);
		$criteria->compare('debouncetime2',$this->debouncetime2);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
