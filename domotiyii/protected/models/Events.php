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
 * @property integer $action1
 * @property integer $action2
 * @property integer $action3
 * @property boolean $rerunenabled
 * @property integer $rerunvalue
 * @property string $reruntype
 * @property integer $category
 */
class Events extends CActiveRecord
{
        /**
         * @return array with all events
         */
        public function getEvents($enabled)
        {
                $data = new CArrayDataProvider($this->findAll(array('order'=>'id ASC')), array(
                        'pagination' => array(
                        'pageSize'=>Yii::app()->params['pagesizeEvents'],
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
			array('trigger1, condition1, condition2, action1, action2, action3, rerunvalue, category', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('operand, reruntype', 'length', 'max'=>16),
			array('enabled, log, firstrun, lastrun, comments, rerunenabled', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, enabled, name, log, firstrun, lastrun, comments, trigger1, condition1, operand, condition2, action1, action2, action3, rerunenabled, rerunvalue, reruntype, category', 'safe', 'on'=>'search'),
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
			'triggers' => array(self::BELONGS_TO, 'Triggers', 'trigger1')
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
			'name' => 'Name',
			'log' => 'Log',
			'firstrun' => 'Firstrun',
			'lastrun' => 'Lastrun',
			'comments' => 'Comments',
			'trigger1' => 'Trigger1',
			'condition1' => 'Condition1',
			'operand' => 'Operand',
			'condition2' => 'Condition2',
			'action1' => 'Action1',
			'action2' => 'Action2',
			'action3' => 'Action3',
			'rerunenabled' => 'Rerunenabled',
			'rerunvalue' => 'Rerunvalue',
			'reruntype' => 'Reruntype',
			'category' => 'Category',
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
		$criteria->compare('action1',$this->action1);
		$criteria->compare('action2',$this->action2);
		$criteria->compare('action3',$this->action3);
		$criteria->compare('rerunenabled',$this->rerunenabled);
		$criteria->compare('rerunvalue',$this->rerunvalue);
		$criteria->compare('reruntype',$this->reruntype,true);
		$criteria->compare('category',$this->category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
}
