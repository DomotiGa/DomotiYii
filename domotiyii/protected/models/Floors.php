<?php

/**
 * This is the model class for table "floors".
 *
 * The followings are the available columns in table 'floors':
 * @property string $floor
 * @property string $name
 * @property string $image
 */
class Floors extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Floors the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return array with all floors
	*/
	public function getFloors()
	{
		$data = new CArrayDataProvider($this->findAll(array('order'=>'floor ASC')), array(
			'keyField' => 'floor',
			'pagination' => array(
				'pageSize'=>Yii::app()->params['pagesizeFloors'],
				'pageVar'=>'page'
			),
		));
		return $data;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'floors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, image', 'length', 'max'=>32),
			array('name, image', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('floor, name, image', 'safe', 'on'=>'search'),
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
			'floor' => 'Floor',
			'name' => 'Name',
			'image' => 'Image',
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

		$criteria->compare('floor',$this->floor,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'keyField'=>'floor',
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize'=>Yii::app()->params['pagesizeFloors'],
				'pageVar'=>'page'
			),

		));
	}
}
