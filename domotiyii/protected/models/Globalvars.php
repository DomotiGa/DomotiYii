<?php

/**
 * This is the model class for table "globalvars".
 *
 * The followings are the available columns in table 'globalvars':
 * @property string $id
 * @property string $var
 * @property string $value
 * @property integer $datatype
 */
class Globalvars extends CActiveRecord
{
        /**
         * Define datatypes
         */
        private $datatypes = array(
                '1' => 'Boolean',
                '2' => 'Byte',
                '3' => 'Integer',
                '4' => 'Integer',
                '5' => 'Long',
                '6' => 'Single',
                '7' => 'Float',
                '8' => 'Date',
                '9' => 'String',
                '11' => 'Variant',
                '15' => 'Null',
                '16' => 'Object',
        );

        /**
         * @return array with all datatypes
         */
        public function getAllDataTypes()
        {
                return $this->datatypes;
        }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'globalvars';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('datatype', 'numerical', 'integerOnly'=>true),
			array('var', 'length', 'max'=>64),
			array('value', 'safe'),
			array('datatype', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, var, value, datatype', 'safe', 'on'=>'search'),
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
			'var' => 'Variable',
			'value' => 'Value',
			'datatype' => 'Datatype',
			'datatypename' => 'Datatype',
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
		$criteria->compare('var',$this->var,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('datatype',$this->datatype);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                                'pageSize'=>Yii::app()->params['pagesizeGlobalvars'],
                                'pageVar'=>'page'
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Globalvars the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


        /**
         * Return datatype name
         */
        public function getDataTypeName()
        {
                if (!empty($this->datatype)) { return $this->datatypes[$this->datatype]; }
        }
}
