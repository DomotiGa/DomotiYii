<?php

/**
 * This is the model class for table "events_actions".
 *
 * The followings are the available columns in table 'events_actions':
 * @property string $event
 * @property integer $action
 * @property integer $order
 * @property integer $delay
 */
class Actions extends CActiveRecord
{
        /**
         * @return array with all actions
         */
        public function getActions($enabled)
        {
                $data = new CArrayDataProvider($this->findAll(array('order'=>'event ASC')), array(
			'keyField' => 'event',
                        'pagination' => array(
                        'pageSize'=>Yii::app()->params['pagesizeActions'],
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
		return 'events_actions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event, action, order, delay', 'required'),
			array('action, order, delay', 'numerical', 'integerOnly'=>true),
			array('event', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('event, action, order, delay', 'safe', 'on'=>'search'),
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
			'event' => 'Event',
			'action' => 'Action',
			'order' => 'Order',
			'delay' => 'Delay',
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

		$criteria->compare('event',$this->event,true);
		$criteria->compare('action',$this->action);
		$criteria->compare('order',$this->order);
		$criteria->compare('delay',$this->delay);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventsActions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
