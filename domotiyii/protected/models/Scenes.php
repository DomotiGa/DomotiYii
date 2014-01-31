<?php

/**
 * This is the model class for table "scenes".
 *
 * The followings are the available columns in table 'scenes':
 * @property string $id
 * @property boolean $enabled
 * @property string $name
 * @property boolean $log
 * @property string $firstrun
 * @property string $lastrun
 * @property string $comments
 * @property integer $category
 * @property integer $location_id
 * @property integer $event_id 
*/

class Scenes extends CActiveRecord
{
        /**
         * @return dropdownlist with the list of scenes
         */
        public function getEvents()
        {
                return CHtml::listData(Events::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

        /**
         * @return dropdownlist with the list of locations
         */
        public function getLocations()
        {
        	return CHtml::listData(Locations::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

        /**
         * @return dropdownlist with the list of scenes
         */
        public function getCategories()
        {
                return CHtml::listData(Category::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'scenes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category, location_id, event_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('enabled, log', 'boolean', 'trueValue'=>-1),
			array('firstrun, lastrun, comments', 'safe'),
			array('name, location_id, event_id', 'required'),
			array('name', 'unique', 'caseSensitive'=>false),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, enabled, name, log, firstrun, lastrun, comments, category,location_id , event_id', 'safe', 'on'=>'search'),
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
			'l_category' => array(self::BELONGS_TO, 'Category', 'category'),
			'location' => array(self::BELONGS_TO, 'Locations', 'location_id'),
			'event' => array(self::BELONGS_TO, 'Events', 'event_id'),
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
			'l_category.name' => Yii::t('app','Category'),
			'location_id' => Yii::t('app','Location'),
            		'location.name' => Yii::t('app','Location'),
			'event_id' => Yii::t('app','Event'),
			'event.name' => Yii::t('app','Event'),		
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
	public function search($enablepagination = true)
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
		$criteria->compare('category',$this->category);
		$criteria->compare('location_id',$this->location_id);
		$criteria->compare('event_id',$this->event_id);

	
		if ($enablepagination) {
			return new CActiveDataProvider($this, array(
				'pagination' => array(
					'pageSize'=>Yii::app()->params['pagesizeScenes'],
					'pageVar'=>'page'
                        	),
				'criteria'=>$criteria,
				'sort'=>array(
					'defaultOrder'=>'name ASC',
				),
			));
		} else {
			return new CActiveDataProvider($this, array(
				'pagination' => false,
				'criteria'=>$criteria,
				'sort'=>array(
					'defaultOrder'=>'name ASC',
				),
			));
		}
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Scenes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

        /**
         * Replace date with 'Today'
         */
        public function getLastRunText()
        {
                return str_replace(date("Y-m-d"), "", $this->lastrun);
        }
}
