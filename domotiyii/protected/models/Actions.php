<?php

/**
 * This is the model class for table "actions".
 *
 * The followings are the available columns in table 'actions':
 * @property string $id
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $param1
 * @property string $param2
 * @property string $param3
 * @property string $param4
 * @property string $param5
 */
class Actions extends CActiveRecord
{
        /**
         * @return array with all actions
         */
        public function getActions($enabled)
        {
                $data = new CArrayDataProvider($this->findAll(array('order'=>'id ASC')), array(
                        'pagination' => array(
                        'pageSize'=>Yii::app()->params['pagesizeActions'],
                        'pageVar'=>'page'
                        ),
                ));
                return $data;
        }

        /**
         * @return typestring 
         */
        public function getActionType($id)
        {
                return CHtml::listData(Devicetypes::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('description, param1, param2, param3, param4, param5', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, description, param1, param2, param3, param4, param5', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'description' => 'Description',
			'param1' => 'Param1',
			'param2' => 'Param2',
			'param3' => 'Param3',
			'param4' => 'Param4',
			'param5' => 'Param5',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('param1',$this->param1,true);
		$criteria->compare('param2',$this->param2,true);
		$criteria->compare('param3',$this->param3,true);
		$criteria->compare('param4',$this->param4,true);
		$criteria->compare('param5',$this->param5,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Actions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}