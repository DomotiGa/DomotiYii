<?php

/**
 * This is the model class for table "settings_rfxcomxpl".
 *
 * The followings are the available columns in table 'settings_rfxcomxpl':
 * @property integer $id
 * @property boolean $enabled
 * @property string $rxaddress
 * @property string $txaddress
 * @property boolean $oldaddrfmt
 * @property boolean $globalx10
 * @property boolean $debug
 */
class SettingsRfxcomxpl extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsRfxcomxpl the static model class
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
		return 'settings_rfxcomxpl';
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
			array('id', 'numerical', 'integerOnly'=>true),
			array('enabled, oldaddrfmt, globalx10, debug', 'numerical'),
			array('rxaddress, txaddress', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, rxaddress, txaddress, oldaddrfmt, globalx10, debug', 'safe', 'on'=>'search'),
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
			'rxaddress' => 'Rx address',
			'txaddress' => 'Tx address',
			'oldaddrfmt' => 'Old address format',
			'globalx10' => 'Global x10',
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
		$criteria->compare('rxaddress',$this->rxaddress,true);
		$criteria->compare('txaddress',$this->txaddress,true);
		$criteria->compare('oldaddrfmt',$this->oldaddrfmt);
		$criteria->compare('globalx10',$this->globalx10);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
