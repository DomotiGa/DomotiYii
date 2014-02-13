<?php

/**
 * This is the model class for table "settings_squeezeserver".
 *
 * The followings are the available columns in table 'settings_squeezeserver':
 * @property integer $id
 * @property boolean $enabled
 * @property string $tcphost
 * @property integer $tcpport
 * @property boolean $debug
 */
class SettingsSqueezeserver extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SettingsSqueezeserver the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'settings_squeezeserver';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, tcpport', 'numerical', 'integerOnly'=>true),
			array('enabled, debug', 'boolean', 'trueValue'=>-1),
			array('tcphost', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, enabled, tcphost, tcpport, debug', 'safe', 'on'=>'search'),
            
            //Example to easily do complex validation, here is a simple example
            // yes i put "id" so i'm sure it will be always tested in choosen scenario
            // and i choose a function name i will define
            array('id','validateFullForm','on'=>'save,update'),
		);
	}
    public function validateFullForm($label,$value) {
        // the more easy first, the port number
        if($this->tcpport<1 || $this->tcpport>65535) 
            $this->addError ('tcpport','Port should be between 1 and 65535');

        //and now the ip address
        $tmp=explode('.',$this->tcphost);
        if(!is_numeric($tmp[0]))
            return;
        if(count($tmp)!==4) // it is a name should we try to ping it ?
            $this->addError ('tcphost','Ip address invalid');
        if($tmp[0]<1 || $tmp[0]>255 ||$tmp[1]<1 || $tmp[1]>255 ||$tmp[2]<1 || $tmp[2]>255 ||$tmp[3]<1 || $tmp[3]>255)
            $this->addError ('tcphost','Ip address invalid');
        //and so on.......
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
			'enabled' => 'Enabled',
			'tcphost' => 'Tcphost',
			'tcpport' => 'Tcpport',
			'debug' => 'Debug',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('tcphost',$this->tcphost,true);
		$criteria->compare('tcpport',$this->tcpport);
		$criteria->compare('debug',$this->debug);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
