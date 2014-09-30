<?php

/**
 * This is the model class for table "plugins".
 *
 * The followings are the available columns in table 'plugins':
 * @property string $id
 * @property string $name
 * @property string $interface
 * @property string $type
 * @property string $protocols
 */
class Plugins extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Interfaces the static model class
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
		return 'plugins';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('interface, name, type', 'length', 'max'=>32),
			array('protocols', 'length', 'max'=>512),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, interface, name, protocols, type', 'safe', 'on'=>'search'),
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
			'interface' => 'Interface',
			'type' => 'Type',
			'protocols' => 'Protocols',
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
		$criteria->compare('interface',$this->interface,true);
		$criteria->compare('protocols',$this->protocols,true);

		return new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,
                        'pagination' => array(
                                'pageSize'=>Yii::app()->params['pagesizePlugins'],
                                'pageVar'=>'page'
                        ),
		));
	}
}
