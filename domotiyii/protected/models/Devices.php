<?php

/**
 * This is the model class for table "devices".
 *
 * The followings are the available columns in table 'devices':
 * @property string $id
 * @property string $name
 * @property string $address
 * @property integer $module
 * @property integer $location
 * @property string $value
 * @property string $value2
 * @property string $value3
 * @property string $value4
 * @property string $label
 * @property string $label2
 * @property string $label3
 * @property string $label4
 * @property string $correction
 * @property string $correction2
 * @property string $correction3
 * @property string $correction4
 * @property string $onicon
 * @property string $officon
 * @property string $dimicon
 * @property integer $interface
 * @property string $firstseen
 * @property string $lastseen
 * @property boolean $enabled
 * @property boolean $hide
 * @property boolean $log
 * @property boolean $logdisplay
 * @property boolean $logspeak
 * @property string $groups
 * @property boolean $rrd
 * @property boolean $graph
 * @property string $batterystatus
 * @property integer $tampered
 * @property string $comments
 * @property string $valuerrddsname
 * @property string $value2rrddsname
 * @property string $value3rrddsname
 * @property string $value4rrddsname
 * @property string $valuerrdtype
 * @property string $value2rrdtype
 * @property string $value3rrdtype
 * @property string $value4rrdtype
 * @property boolean $switchable
 * @property boolean $dimable
 * @property boolean $extcode
 * @property integer $x
 * @property integer $y
 * @property integer $floorplan
 * @property string $lastchanged
 * @property integer $repeatstate
 * @property integer $repeatperiod
 * @property integer $reset
 * @property integer $resetperiod
 * @property string $resetvalue
 * @property boolean $poll
 */
class Devices extends CActiveRecord
{
        /**
         * used by protocol combobox inside device editor
         */
	public $protocol;

        /**
         * @return dropdownlist with the list of devices (used in temperaturenu, bwired, pachube devices)
         */
        public function getDevices()
        {
                return CHtml::listData(Devices::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

	/**
         * @return dropdownlist with the list of modules/devicetypes
	 */
        public function getDeviceTypes()
        {
        	return CHtml::listData(Devicetypes::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

	/**
         * @return dropdownlist with the list of modules/devicetypes protocols
	 */
        public function getDeviceProtocols()
        {
		return CHtml::listData(Devicetypes::model()->findAll(array('select'=>'type', 'order'=>'type ASC', 'distinct'=>true)), 'type', 'type');
        }

	/**
         * @return dropdownlist with the list of interfaces
	 */
        public function getInterfaces()
        {
        	return CHtml::listData(Interfaces::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

        /**
         * @return dropdownlist with the list of interfaces, based on the device model id eg 112
         */
        public function getInterfacesByDeviceModel($id)
        {
                $devicetype = Devicetypes::model()->find('id=:id', array(':id'=>$id,));
                if ($devicetype === null)
                {
                        return CHtml::listData(Interfaces::model(), 'id', 'name');
                }
                else
                {
                        return CHtml::listData(Interfaces::model()->findAll("type LIKE '%" . $devicetype->type . "%'", array('order'=>'name ASC')), 'id', 'name');
                }
        }

	/**
         * @return dropdownlist with the list of interfaces, based on the DeviceType eg '1-Wire'
	 */
	public function getInterfacesByDeviceType($type)
	{
		return CHtml::listData(Interfaces::model()->findAll("type LIKE '%" . $type . "%'", array('order'=>'name ASC')), 'id', 'name');
	}

	/**
         * @return dropdownlist with the list of devices, based on the DeviceType
	 */
	public function getDeviceTypesByType($protocol)
	{
		return CHtml::listData(Devicetypes::model()->findAll("type LIKE '%" . $protocol . "%'", array('order'=>'name ASC')), 'id', 'name');
	}

	/**
         * @return dropdownlist with the list of locations
	 */
        public function getLocations()
        {
        	return CHtml::listData(Locations::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

	/**
         * @return dropdownlist with the list of types/protocols
	 */
        public function getTypes()
        {
        	return CHtml::listData(Devicetypes::model()->findAll(), 'type', 'type');
        }

        /**
         * @return dropdownlist with the list of floorplans
         */
        public function getFloors()
        {
                return CHtml::listData(Floors::model()->findAll(array('order'=>'name ASC')), 'name', 'name');
        }

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Devices the static model class
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
		return 'devices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('module, location, interface, tampered, extcode, x, y, floorplan, repeatperiod, resetperiod, poll', 'numerical', 'integerOnly'=>true),
			array('name, label, label2, label3, label4, onicon, officon, dimicon, batterystatus, valuerrddsname, value2rrddsname, value3rrddsname, value4rrddsname, valuerrdtype, value2rrdtype, value3rrdtype, value4rrdtype', 'length', 'max'=>32),
            array('enabled, hide, log, logdisplay, logspeak, rrd, graph, switchable, dimable, extcode, repeatstate, reset', 'boolean', 'trueValue'=> -1),	        
            array('name', 'notOnlyNumbers'),
			array('address', 'length', 'max'=>64),
			array('groups', 'length', 'max'=>128),
			array('value, value2, value3, value4, correction, correction2, correction3, correction4, firstseen, lastseen, comments, lastchanged, resetvalue', 'safe'),
			array('name, module, interface, address', 'required'),
			array('name', 'unique', 'caseSensitive'=>false),
//			array('address', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, module, location, value, value2, value3, value4, label, label2, label3, label4, correction, correction2, correction3, correction4, onicon, officon, dimicon, interface, firstseen, lastseen, enabled, hide, log, logdisplay, logspeak, groups, rrd, graph, batterystatus, tampered, comments, valuerrddsname, value2rrddsname, value3rrddsname, value4rrddsname, valuerrdtype, value2rrdtype, value3rrdtype, value4rrdtype, switchable, dimable, extcode, x, y, floorplan, lastchanged, repeatstate, repeatperiod, reset, resetperiod, resetvalue, poll', 'safe', 'on'=>'search'),
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
			'devicetype' => array(self::BELONGS_TO, 'Devicetypes','module'),
			'l_location' => array(self::BELONGS_TO, 'Locations','location'),
			'l_interface' => array(self::BELONGS_TO, 'Interfaces','interface'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'name' => Yii::t('app','Name'),
			'address' => Yii::t('app','Address'),
			'module' => Yii::t('app','Device'),
			'location' => Yii::t('app','Location'),
			'l_location.name' => Yii::t('app','Location'),
			'value' => Yii::t('app','Value1'),
			'value2' => Yii::t('app','Value2'),
			'value3' => Yii::t('app','Value3'),
			'value4' => Yii::t('app','Value4'),
			'label' => Yii::t('app','Label1'),
			'label2' => Yii::t('app','Label2'),
			'label3' => Yii::t('app','Label3'),
			'label4' => Yii::t('app','Label4'),
			'correction' => Yii::t('app','Correction1'),
			'correction2' => Yii::t('app','Correction2'),
			'correction3' => Yii::t('app','Correction3'),
			'correction4' => Yii::t('app','Correction4'),
			'onicon' => Yii::t('app','On icon'),
			'officon' => Yii::t('app','Off icon'),
			'dimicon' => Yii::t('app','Dim icon'),
			'interface' => Yii::t('app','Interface'),
			'l_interface.name' => Yii::t('app','Interface'),
			'firstseen' => Yii::t('app','First seen'),
			'lastseen' => Yii::t('app','Last seen'),
			'enabled' => Yii::t('app','Enabled'),
			'hide' => Yii::t('app','Hide device'),
			'log' => Yii::t('app','Log status changes to db'),
			'logdisplay' => Yii::t('app','Display status changes'),
			'logspeak' => Yii::t('app','Speak status changes'),
			'groups' => Yii::t('app','Groups'),
			'rrd' => Yii::t('app','Log RRD data'),
			'graph' => Yii::t('app','Enable simple graphing'),
			'batterystatus' => Yii::t('app','Battery status'),
			'tampered' => Yii::t('app','Tampered'),
			'comments' => Yii::t('app','Comments'),
			'valuerrddsname' => Yii::t('app','Value1 rrd dsname'),
			'value2rrddsname' => Yii::t('app','Value2 rrd dsname'),
			'value3rrddsname' => Yii::t('app','Value3 rrd dsname'),
			'value4rrddsname' => Yii::t('app','Value4 rrd dsname'),
			'valuerrdtype' => Yii::t('app','Value1 rrd type'),
			'value2rrdtype' => Yii::t('app','Value2 rrd type'),
			'value3rrdtype' => Yii::t('app','Value3 rrd type'),
			'value4rrdtype' => Yii::t('app','Value4 rrd type'),
			'switchable' => Yii::t('app','Device can be switched'),
			'dimable' => Yii::t('app','Device can be dimmed'),
			'extcode' => Yii::t('app','Supports extended X10'),
			'x' => Yii::t('app','X'),
			'y' => Yii::t('app','Y'),
			'floorplan' => Yii::t('app','Floorplan'),
			'lastchanged' => Yii::t('app','Last changed'),
			'repeatstate' => Yii::t('app','Repeat state enabled'),
			'repeatperiod' => Yii::t('app','Repeat period'),
			'reset' => Yii::t('app','Reset status enabled'),
			'resetperiod' => Yii::t('app','Reset period'),
			'resetvalue' => Yii::t('app','Reset value'),
			'poll' => Yii::t('app','Poll device (ZWave only)'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */

	public function search($enablepagination = true)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('module',$this->module);
		$criteria->compare('location',$this->location);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('value2',$this->value2,true);
		$criteria->compare('value3',$this->value3,true);
		$criteria->compare('value4',$this->value4,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('label2',$this->label2,true);
		$criteria->compare('label3',$this->label3,true);
		$criteria->compare('label4',$this->label4,true);
		$criteria->compare('correction',$this->correction,true);
		$criteria->compare('correction2',$this->correction2,true);
		$criteria->compare('correction3',$this->correction3,true);
		$criteria->compare('correction4',$this->correction4,true);
		$criteria->compare('onicon',$this->onicon,true);
		$criteria->compare('officon',$this->officon,true);
		$criteria->compare('dimicon',$this->dimicon,true);
		$criteria->compare('interface',$this->interface);
		$criteria->compare('firstseen',$this->firstseen,true);
		$criteria->compare('lastseen',$this->lastseen,true);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('hide',$this->hide);
		$criteria->compare('log',$this->log);
		$criteria->compare('logdisplay',$this->logdisplay);
		$criteria->compare('logspeak',$this->logspeak);
		$criteria->compare('groups',$this->groups,true);
		$criteria->compare('rrd',$this->rrd);
		$criteria->compare('graph',$this->graph);
		$criteria->compare('batterystatus',$this->batterystatus,true);
		$criteria->compare('tampered',$this->tampered);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('valuerrddsname',$this->valuerrddsname,true);
		$criteria->compare('value2rrddsname',$this->value2rrddsname,true);
		$criteria->compare('value3rrddsname',$this->value3rrddsname,true);
		$criteria->compare('value4rrddsname',$this->value4rrddsname,true);
		$criteria->compare('valuerrdtype',$this->valuerrdtype,true);
		$criteria->compare('value2rrdtype',$this->value2rrdtype,true);
		$criteria->compare('value3rrdtype',$this->value3rrdtype,true);
		$criteria->compare('value4rrdtype',$this->value4rrdtype,true);
		$criteria->compare('switchable',$this->switchable);
		$criteria->compare('dimable',$this->dimable);
		$criteria->compare('extcode',$this->extcode);
		$criteria->compare('x',$this->x);
		$criteria->compare('y',$this->y);
		$criteria->compare('floorplan',$this->floorplan);
		$criteria->compare('lastchanged',$this->lastchanged,true);
		$criteria->compare('repeatstate',$this->repeatstate);
		$criteria->compare('repeatperiod',$this->repeatperiod);
		$criteria->compare('reset',$this->reset);
		$criteria->compare('resetperiod',$this->resetperiod);
		$criteria->compare('resetvalue',$this->resetvalue,true);
		$criteria->compare('poll',$this->poll);

		if ($enablepagination) {
			return new CActiveDataProvider($this, array(
				'pagination' => array(
					'pageSize'=>Yii::app()->params['pagesizeDevices'],
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
	 * request an xmlrpc call
	 */
	protected function do_xmlrpc($request) {

		$context = stream_context_create(array('http' => array('method' => "POST",'header' =>"Content-Type: text/xml",'content' => $request)));
		if ($file = @file_get_contents(Yii::app()->params['xmlrpcHost'], false, $context)) {
			$file=str_replace("i8","double",$file);
			return xmlrpc_decode($file, "UTF-8");
		} else {
			Yii::app()->user->setFlash('error', "Couldn't connect to XML-RPC service on '" . Yii::app()->params['xmlrpcHost'] . "'");
		}
	}

	/**
	 * Check if the value is not empty and does not only contain numbers
	 * This is the 'notOnlyNumbers' validator as declared in rules().
	 */
	public function notOnlyNumbers($attribute, $params)
	{
		if (!strlen($this->$attribute)) {
			$this->addError($attribute, $this->getAttributeLabel($attribute)." ".Yii::t('app', 'cannot be blank.'));
		} else {
			if(!preg_match('/(?!^\d+$)^.+$/', $this->$attribute))
				$this->addError($attribute, $this->getAttributeLabel($attribute)." ".Yii::t('app', 'not allowed to only contain numbers.'));
		}
	}

	/**
	 * Concatenate values and labels
	 */
	public function getValueLabel()
	{
		return $this->value." ".$this->label;
	}

	public function getValueLabel2()
	{
		return $this->value2." ".$this->label2;
	}

	public function getValueLabel3()
	{
		return $this->value3." ".$this->label3;
	}

	public function getValueLabel4()
	{
		return $this->value4." ".$this->label4;
	}

	/**
	 * Location Name
	 */
	public function getLocationText()
	{
		if (!empty($this->l_location->name)) { return $this->l_location->name; }
	}

	/**
	 * Replace date with 'Today'
	 */
	public function getLastSeenText()
	{
		return str_replace(date("Y-m-d"), "", $this->lastseen);

	}
}
