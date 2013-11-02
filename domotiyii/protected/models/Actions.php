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

/*
' action database table
' description       | type | param1      | param2 | param3 | param4 | param5
' set device value  | 1                  | deviceid                  | value fieldname      | value
' set globalvar     | 2                  | globalvar name            | value
' send e-mail       | 3                  | to address                | subject              | body
' speak text        | 4                  | voice or 'female', 'male' | text
' execute command   | 5                  | shell command to run
' send tweet        | 6                  | tweet message to send
' send SMS message  | 7                  | to SMS number             | message
' send IRTrans IR   | 8                  | command string
' play sound        | 9                  | sound file                | volume
' write log entry   | 10                 | log text
' display led msg   | 11                 | message to display        | display id           | color                | speed
' av control        | 12                 | model                     | command              | value                | address
' timer delay       | 13                 | delay in secs or rnd min  | random max seconds   | mode fixed or random
' notify-send       | 14                 | title                     | text
' script            | 15                 | script
' JSON              | 16                 | deviceid                  | post/get             | url
' send Prowl        | 17                 | Prowl message to send
' send NMA          | 18                 | Notify My Android message to send
' send Pushover     | 19                 | Pushover message to send
*/

	/**
	 * Define action names
	 */
	private	$actionnames = array(
		'1' => 'Set Device Value',
		'2' => 'Set Globalvar',
		'3' => 'Send e-mail',
		'4' => 'Speak Text',
		'5' => 'Execute Cmd',
		'6' => 'Send Tweet',
		'7' => 'Send SMS',
		'8' => 'Send IRTrans',
		'9' => 'Play Sound',
		'10' => 'Write Log Entry',
		'11' => 'Display LED Msg',
		'12' => 'AV Control',
		'13' => 'Timer Delay',
		'14' => 'Notify Send',
		'15' => 'Script',
		'16' => 'JSON Post/Get',
		'17' => 'Send Prowl PushMsg',
		'18' => 'Send NMA PushMsg',
		'19' => 'Send Pushover PushMsg'
	);

        /**
         * @return array with all actiontypes texts
         */
        public function getAllActionTypes()
        {
                return $this->actionnames;
        }

        /**
         * @return actionname for $action
         */
        public function getActionText($action)
        {
		return isset($this->actionnames[$action]) ? $this->actionnames[$action] : null;
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
			array('name, type', 'required'),
			array('name', 'unique', 'caseSensitive'=>false),
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
			'actiontype' => 'Type',
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
                        'pagination' => array(
                                'pageSize'=>Yii::app()->params['pagesizeActions'],
                                'pageVar'=>'page'
                        ),
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

        /**
         * @return actiontype
         */
        public function getActionType()
        {
                return isset($this->actionnames[$this->type]) ? $this->actionnames[$this->type] : null;
        }

}
