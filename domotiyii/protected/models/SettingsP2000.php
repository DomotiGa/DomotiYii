<?php

/**
 * This is the model class for table "settings_p2000".
 *
 * The followings are the available columns in table 'settings_p2000':
 * @property integer $id
 * @property boolean $enabled
 * @property string $regios
 * @property integer $messages
 * @property string $discipline
 * @property string $filter
 * @property integer $georange
 * @property boolean $fetchimage
 * @property boolean $maplink
 * @property integer $polltime
 * @property boolean $debug
 */
class SettingsP2000 extends CActiveRecord
{
	// special vars to convert to from multiple list items
	public $regioarray;
	public $disciplinearray;

	public function afterFind() {
		$this->regioarray=explode(',',$this->regios);
		$this->disciplinearray=explode(',',$this->discipline);
		return true;
	}

	public function beforeSave() {
		$this->regios=implode(',',$this->regioarray);
		$this->discipline=implode(',',$this->disciplinearray);
        echo $this->discipline;
		return true;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings_p2000';
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
			array('id, messages, georange, polltime', 'numerical', 'integerOnly'=>true),
			array('regios, discipline, filter', 'length', 'max'=>64),
			array('enabled, fetchimage, maplink, debug, regioarray, disciplinearray', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, enabled, messages, filter, georange, fetchimage, maplink, polltime, debug', 'safe', 'on'=>'search'),
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
			'regioarray' => 'Regios',
			'messages' => 'Messages',
			'disciplinearray' => 'Disciplines',
			'filter' => 'Filter',
			'georange' => 'Georange',
			'fetchimage' => 'Fetchimage',
			'maplink' => 'Maplink',
			'polltime' => 'Polltime',
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
		$criteria->compare('regios',$this->regios,true);
		$criteria->compare('messages',$this->messages);
		$criteria->compare('discipline',$this->discipline,true);
		$criteria->compare('filter',$this->filter,true);
		$criteria->compare('georange',$this->georange);
		$criteria->compare('fetchimage',$this->fetchimage);
		$criteria->compare('maplink',$this->maplink);
		$criteria->compare('polltime',$this->polltime);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SettingsP2000 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
