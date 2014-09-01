<?php

/**
 * This is the model class for table "settings_devicediscover".
 *
 * The followings are the available columns in table 'settings_devicediscover':
 * @property integer $id
 * @property boolean $enabled
 * @property string  $multicasthost
 * @property integer $multicastport
 * @property boolean $listenonly
 * @property integer $broadcastinterval
 * @property boolean $debug
 */
class SettingsDevicediscover extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings_devicediscover';
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
			array('id, multicastport, broadcastinterval', 'numerical', 'integerOnly'=>true),
			array('multicasthost', 'length', 'max'=>32),
			array('enabled, listenonly, debug', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, enabled, multicasthost, multicastport, listenonly, broadcastinterval, debug', 'safe', 'on'=>'search'),
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
			'multicasthost' => 'Multicasthost',
			'multicastport' => 'Multicastport',
			'listenonly' => 'Listenonly',
			'broadcastinterval' => 'Broadcastinterval',
			'debug' => 'Debug',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('multicasthost',$this->multicasthost,true);
		$criteria->compare('multicastport',$this->ulticastport);
		$criteria->compare('listenonly',$this->listenonly,true);
		$criteria->compare('broadcastinterval',$this->broadcastinterval);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SettingsFevicediscover the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
