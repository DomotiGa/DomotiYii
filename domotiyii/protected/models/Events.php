<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property string $id
 * @property boolean $enabled
 * @property string $name
 * @property boolean $log
 * @property string $firstrun
 * @property string $lastrun
 * @property string $comments
 * @property integer $trigger1
 * @property integer $condition1
 * @property string $operand
 * @property integer $condition2
 * @property boolean $rerunenabled
 * @property integer $rerunvalue
 * @property string $reruntype
 * @property integer $category
 */

/**
 * TODO link to actions
 */

class Events extends CActiveRecord
{
        /**
         * @return dropdownlist with the list of triggers
         */
        public function getAllTriggers()
        {
                return CHtml::listData(Triggers::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

        /**
         * @return dropdownlist with the list of conditions
         */
        public function getAllConditions()
        {
                return CHtml::listData(Conditions::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

        /**
         * @return dropdownlist with the list of actions
         */
        public function getAllActions()
        {
                return CHtml::listData(Actions::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

        /**
         * @return dropdownlist with the list of categories
         */
        public function getAllCategories()
        {
                return CHtml::listData(Category::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('trigger1, condition1, condition2, rerunvalue, category', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('operand, reruntype', 'length', 'max'=>16),
			array('enabled, log, rerunenabled', 'boolean', 'trueValue'=>-1),
			array('firstrun, lastrun, comments', 'safe'),
			array('name, trigger1', 'required'),
			array('name', 'unique', 'caseSensitive'=>false),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, enabled, name, log, firstrun, lastrun, comments, trigger1, condition1, operand, condition2, rerunenabled, rerunvalue, reruntype, category', 'safe', 'on'=>'search'),
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
			'triggers' => array(self::BELONGS_TO, 'Triggers', 'trigger1'),
			'l_condition1' => array(self::BELONGS_TO, 'Conditions', 'condition1'),
			'l_condition2' => array(self::BELONGS_TO, 'Conditions', 'condition2'),
			'l_category' => array(self::BELONGS_TO, 'Category', 'category'),
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
			'name' => Yii::t('app','Name'), 
			'log' => Yii::t('app','Log'),
			'firstrun' => Yii::t('app','Firstrun'),
			'lastrun' => Yii::t('app','Lastrun'),
			'comments' => Yii::t('app','Comments'),
			'trigger1' => Yii::t('app','Trigger'),
			'triggername' => Yii::t('app','Trigger'),
			'condition1' => Yii::t('app','Condition1'),
			'conditionname1' => Yii::t('app','Condition1'),
			'operand' => Yii::t('app','Operand'),
			'condition2' => Yii::t('app','Condition2'),
			'conditionname2' => Yii::t('app','Condition2'),
			'rerunenabled' => Yii::t('app','Rerun enabled'),
			'rerunvalue' => Yii::t('app','Rerun value'),
			'reruntype' => Yii::t('app','Rerun type'),
			'category' => Yii::t('app','Category'),
			'categoryname' => Yii::t('app','Category'),
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
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('log',$this->log);
		$criteria->compare('firstrun',$this->firstrun,true);
		$criteria->compare('lastrun',$this->lastrun,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('trigger1',$this->trigger1);
		$criteria->compare('condition1',$this->condition1);
		$criteria->compare('operand',$this->operand,true);
		$criteria->compare('condition2',$this->condition2);
		$criteria->compare('rerunenabled',$this->rerunenabled);
		$criteria->compare('rerunvalue',$this->rerunvalue);
		$criteria->compare('reruntype',$this->reruntype,true);
		$criteria->compare('category',$this->category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize'=>Yii::app()->params['pagesizeEvents'],
				'pageVar'=>'page'
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

        /**
         * Return trigger name
         */
        public function getTriggerName()
        {
                if (!empty($this->triggers->name)) { return $this->triggers->name; }
        }

        /**
         * Return category name
         */
        public function getCategoryName()
        {
                if (!empty($this->category->name)) { return $this->category->name; }
	}


        /**
         * Return condition1 name
         */
        public function getConditionName1()
        {
                if (!empty($this->l_condition1->name))
		{
			return $this->l_condition1->name;
		} else {
			return null;
		}
	}

        /**
         * Return condition2 name
         */
        public function getConditionName2()
        {
                if (!empty($this->l_condition2->name))
		{
			return $this->l_condition2->name;
		} else {
			return null;
		}
	}

        /**
         * Replace date with 'Today'
         */
        public function getLastRunText()
        {
                return str_replace(date("Y-m-d"), "", $this->lastrun);

        }
}
