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
 * @property integer $trigger_id
 * @property integer $condition1_id
 * @property string $operand
 * @property integer $condition2_id
 * @property boolean $rerunenabled
 * @property integer $rerunvalue
 * @property string $reruntype
 * @property integer $category_id
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
			array('trigger_id, condition1_id, condition2_id, rerunvalue, category_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('operand, reruntype', 'length', 'max'=>16),
			array('enabled, log, rerunenabled', 'boolean', 'trueValue'=>-1),
			array('firstrun, lastrun, comments', 'safe'),
			array('name, trigger_id', 'required'),
			array('name', 'unique', 'caseSensitive'=>false),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, enabled, name, log, firstrun, lastrun, comments, trigger_id, condition1_id, operand, condition2_id, rerunenabled, rerunvalue, reruntype, category_id', 'safe', 'on'=>'search'),
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
			'triggers' => array(self::BELONGS_TO, 'Triggers', 'trigger_id'),
			'l_condition1_id' => array(self::BELONGS_TO, 'Conditions', 'condition1_id'),
			'l_condition2_id' => array(self::BELONGS_TO, 'Conditions', 'condition2_id'),
			'l_category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'events_actions' => array(self::HAS_MANY, 'EventsActions', 'event'), 
			'actions' => array(self::HAS_MANY, 'Actions', 'action', 'through' => 'events_actions', 'order' => 'events_actions.order'),
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
			'trigger_id' => Yii::t('app','Trigger'),
			'triggername' => Yii::t('app','Trigger'),
			'l_condition1_id' => Yii::t('app','Condition1'),
			'conditionname1' => Yii::t('app','Condition1'),
			'operand' => Yii::t('app','Operand'),
			'l_condition2_id' => Yii::t('app','Condition2'),
			'conditionname2' => Yii::t('app','Condition2'),
			'rerunenabled' => Yii::t('app','Don\'t rerun event if it already ran in last:'),
			'rerunvalue' => Yii::t('app',''),
			'reruntype' => Yii::t('app',''),
			'category_id' => Yii::t('app','Category'),
			'categoryname' => Yii::t('app','Category'),
		);
	}
    public function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->condition1_id == NULL)
                $this->condition1_id = 0;
            if ($this->condition2_id == NULL)
                $this->condition2_id = 0;
            return TRUE;
        }
        return FALSE;
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
		$criteria->compare('trigger_id',$this->trigger_id);
		$criteria->compare('condition1_id',$this->condition1_id);
		$criteria->compare('operand',$this->operand,true);
		$criteria->compare('condition2_id',$this->condition2_id);
		$criteria->compare('rerunenabled',$this->rerunenabled);
		$criteria->compare('rerunvalue',$this->rerunvalue);
		$criteria->compare('reruntype',$this->reruntype,true);
		$criteria->compare('category_id',$this->category_id);

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
                if (!empty($this->category_id->name)) { return $this->category_id->name; }
	}

        /**
         * Return condition1 name
         */
        public function getConditionName1()
        {
                if (!empty($this->l_condition1_id->name))
		{
			return $this->l_condition1_id->name;
		} else {
			return null;
		}
	}

        /**
         * Return condition2 name
         */
        public function getConditionName2()
        {
                if (!empty($this->l_condition2_id->name))
		{
			return $this->l_condition2_id->name;
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
