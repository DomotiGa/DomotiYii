<?php

/**
 * This is the model class for table "devices_camera".
 *
 * The followings are the available columns in table 'devices_camera':
 * @property string $id
 * @property string $name
 * @property string $type
 * @property string $cmdoptions
 * @property string $viewstring
 * @property string $grabstring
 * @property string $ptztype
 * @property string $ptzbaseurl
 * @property string $description
 * @property integer $viscaaddress
 * @property string $username
 * @property string $passwd
 * @property boolean $enabled
 */
class Cameras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'devices_camera';
	}

        /**
         * Define cameratypes
         */
        private $cameratypes = array(
                'Video4Linux' => 'Video4Linux',
                'Fetch Image' => 'Fetch Image',
                'Stream MJPEG' => 'Stream MJPEG',
        );

        /**
         * @return array with all cameratypes
         */
        public function getAllCameraTypes()
        {
                return $this->cameratypes;
        }

        /**
         * Define cameraptztypes
         */
        private $cameraptztypes = array(
                'Sony VISCA' => 'Sony VISCA',
                'Axis API' => 'Axis API',
                'Watchbot API' => 'Watchbot API',
	);

        /**
         * @return array with all cameraptztypes
         */
        public function getAllCameraPTZTypes()
        {
                return $this->cameraptztypes;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('viscaaddress', 'numerical', 'integerOnly'=>true),
			array('name, username, passwd', 'length', 'max'=>64),
			array('type, ptztype', 'length', 'max'=>32),
			array('description', 'length', 'max'=>128),
			array('cmdoptions, viewstring, grabstring, ptzbaseurl', 'safe'),
			array('name, type', 'required'),
			array('enabled', 'boolean', 'trueValue'=>-1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, cmdoptions, viewstring, grabstring, ptztype, ptzbaseurl, description, viscaaddress, username, passwd, enabled', 'safe', 'on'=>'search'),
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
			'cmdoptions' => 'Cmdoptions',
			'viewstring' => 'Viewstring',
			'grabstring' => 'Grabstring',
			'ptztype' => 'Ptztype',
			'ptzbaseurl' => 'Ptzbaseurl',
			'description' => 'Description',
			'viscaaddress' => 'Viscaaddress',
			'username' => 'Username',
			'passwd' => 'Password',
			'enabled' => 'Enabled',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('cmdoptions',$this->cmdoptions,true);
		$criteria->compare('viewstring',$this->viewstring,true);
		$criteria->compare('grabstring',$this->grabstring,true);
		$criteria->compare('ptztype',$this->ptztype,true);
		$criteria->compare('ptzbaseurl',$this->ptzbaseurl,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('viscaaddress',$this->viscaaddress);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('passwd',$this->passwd,true);
		$criteria->compare('enabled',$this->enabled);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination' => array(
                                'pageSize'=>Yii::app()->params['pagesizeCameras'],
                                'pageVar'=>'page'
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cameras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
