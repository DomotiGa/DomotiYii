<?php

/**
 * This is the model class for table "devicetypes".
 *
 * The followings are the available columns in table 'devicetypes':
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $addressformat
 * @property string $onicon
 * @property string $officon
 * @property string $dimicon
 * @property boolean $switchable
 * @property boolean $dimable
 * @property boolean $extcode
 * @property integer $label
 * @property integer $label2
 * @property integer $label3
 * @property integer $label4
 */
class Devicetypes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Devicetypes the static model class
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
		return 'devicetypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('label, label2, label3, label4', 'numerical', 'integerOnly'=>true),
			array('name, description, type, onicon, officon, dimicon', 'length', 'max'=>32),
			array('addressformat', 'length', 'max'=>128),
			array('switchable, dimable, extcode', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, type, addressformat, onicon, officon, dimicon, switchable, dimable, extcode, label, label2, label3, label4', 'safe', 'on'=>'search'),
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
			'description' => 'Description',
			'type' => 'Type',
			'addressformat' => 'Addressformat',
			'onicon' => 'Onicon',
			'officon' => 'Officon',
			'dimicon' => 'Dimicon',
			'switchable' => 'Switchable',
			'dimable' => 'Dimable',
			'extcode' => 'Extcode',
			'label' => 'Label',
			'label2' => 'Label2',
			'label3' => 'Label3',
			'label4' => 'Label4',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('addressformat',$this->addressformat,true);
		$criteria->compare('onicon',$this->onicon,true);
		$criteria->compare('officon',$this->officon,true);
		$criteria->compare('dimicon',$this->dimicon,true);
		$criteria->compare('switchable',$this->switchable);
		$criteria->compare('dimable',$this->dimable);
		$criteria->compare('extcode',$this->extcode);
		$criteria->compare('label',$this->label);
		$criteria->compare('label2',$this->label2);
		$criteria->compare('label3',$this->label3);
		$criteria->compare('label4',$this->label4);

		return new CActiveDataProvider($this, array(
			'pagination' => array(
                                'pageSize'=>Yii::app()->params['pagesizeDevicetypes'],
                        ),
			'criteria'=>$criteria,
		));
	}
}
