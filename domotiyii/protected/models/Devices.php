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
	 * @return array with device of type requested
	 */
	public function getDevices($type)
	{
		$deviceitems = new CArrayDataProvider($this->get_device_list($type), array(
			'pagination' => array(
			'pageSize'=>Yii::app()->params['pagesizeDevices'],
			'pageVar'=>'page'
			),
		));
		return $deviceitems;
	}

	/**
         * @return dropdownlist with the list of modules/devicetypes
	 */
        public function getDeviceTypes()
        {
        	return CHtml::listData(Devicetypes::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

	/**
         * @return dropdownlist with the list of interfaces
	 */
        public function getInterfaces()
        {
        	return CHtml::listData(Interfaces::model()->findAll(array('order'=>'name ASC')), 'id', 'name');
        }

	/**
         * @return dropdownlist with the list of interfaces, based on the DeviceType
	 */
	public function getInterfacesByDeviceType($id)
	{
		$devicetype = Devicetypes::model()->find('id=:id', array(':id'=>$id,));
		if ( $devicetype === null )
		{
			return CHtml::listData(Interfaces::model(), 'id', 'name');
		}
		else
		{
			return CHtml::listData(Interfaces::model()->findAll("type LIKE '%" . $devicetype->type . "%'", array('order'=>'name ASC')), 'id', 'name');
		}	
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
			array('module, location, interface, enabled, hide, log, logdisplay, logspeak, rrd, graph, tampered, switchable, dimable, extcode, x, y, floorplan, repeatstate, repeatperiod, reset, resetperiod, poll', 'numerical', 'integerOnly'=>true),
			array('name, label, label2, label3, label4, onicon, officon, dimicon, batterystatus, valuerrddsname, value2rrddsname, value3rrddsname, value4rrddsname, valuerrdtype, value2rrdtype, value3rrdtype, value4rrdtype', 'length', 'max'=>32),
	        array('name', 'notOnlyNumbers'),
			array('address', 'length', 'max'=>64),
			array('groups', 'length', 'max'=>128),
			array('value, value2, value3, value4, correction, correction2, correction3, correction4, firstseen, lastseen, comments, lastchanged, resetvalue', 'safe'),
			array('name, module, interface, address', 'required'),
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
			'id' => 'ID',
			'name' => 'Name',
			'address' => 'Address',
			'module' => 'Device',
			'location' => 'Location',
			'l_location.name' => 'Location',
			'value' => 'Value1',
			'value2' => 'Value2',
			'value3' => 'Value3',
			'value4' => 'Value4',
			'label' => 'Label1',
			'label2' => 'Label2',
			'label3' => 'Label3',
			'label4' => 'Label4',
			'correction' => 'Correction1',
			'correction2' => 'Correction2',
			'correction3' => 'Correction3',
			'correction4' => 'Correction4',
			'onicon' => 'On icon',
			'officon' => 'Off icon',
			'dimicon' => 'Dim icon',
			'interface' => 'Interface',
			'l_interface.name' => 'Interface',
			'firstseen' => 'First seen',
			'lastseen' => 'Last seen',
			'enabled' => 'Enabled',
			'hide' => 'Hide device',
			'log' => 'Log status changes to db',
			'logdisplay' => 'Display status changes',
			'logspeak' => 'Speak status changes',
			'groups' => 'Groups',
			'rrd' => 'Log RRD data',
			'graph' => 'Enable simple graphing',
			'batterystatus' => 'Battery status',
			'tampered' => 'Tampered',
			'comments' => 'Comments',
			'valuerrddsname' => 'Value1 rrd dsname',
			'value2rrddsname' => 'Value2 rrd dsname',
			'value3rrddsname' => 'Value3 rrd dsname',
			'value4rrddsname' => 'Value4 rrd dsname',
			'valuerrdtype' => 'Value1 rrd type',
			'value2rrdtype' => 'Value2 rrd type',
			'value3rrdtype' => 'Value3 rrd type',
			'value4rrdtype' => 'Value4 rrd type',
			'switchable' => 'Device can be switched',
			'dimable' => 'Device can be dimmed',
			'extcode' => 'Supports extended X10',
			'x' => 'X',
			'y' => 'Y',
			'floorplan' => 'Floorplan',
			'lastchanged' => 'Last changed',
			'repeatstate' => 'Repeat state enabled',
			'repeatperiod' => 'Repeat period',
			'reset' => 'Reset status enabled',
			'resetperiod' => 'Reset period',
			'resetvalue' => 'Reset value',
			'poll' => 'Poll device (ZWave only)',
		);
	}

	/**
	 * Retrieves a list of devices
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
        public function displayDevices()
        {
                $criteria=new CDbCriteria;

                $criteria->condition = "enabled=true";

                return new CActiveDataProvider($this, array(
                        'criteria'=>$criteria,
                ));
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
	 * @return array with list of devices of type
	 */
	protected function get_device_list($type) {

		$retarr = array();
		$index = 0;
		$locations = array();

		$request = xmlrpc_encode_request("device.list",null);
		$response = $this->do_xmlrpc($request);

		if ($response === null) { return $retarr; }

		if (is_array($response) && xmlrpc_is_fault($response)) {
			Yii::app()->user->setFlash('error', "XMLRPC error received while fetching device list: ".$response['faultString']." (".$response['faultCode'].")");
		} else {
			foreach($response AS $item) {
				list($retarr[$index]['id'], $retarr[$index]['deviceicon'], $retarr[$index]['devicename'], $retarr[$index]['devicelocation'], $retarr[$index]['devicevalue'], $retarr[$index]['devicelabel'], $retarr[$index]['devicevalue2'], $retarr[$index]['devicelabel2'], $retarr[$index]['devicevalue3'], $retarr[$index]['devicelabel3'], $retarr[$index]['devicevalue4'], $retarr[$index]['devicelabel4'], $retarr[$index]['devicelastseen'], $retarr[$index]['dimmable'], $retarr[$index]['switchable']) = explode (';;', $item);

/*
				if (strlen($retarr[$index]['devicelocation'])) {
					$locations[$index]['label'] = $retarr[$index]['devicelocation'];
					$locations[$index]['url'] = $retarr[$index]['devicelocation'];
				}
*/

				// concat values and labels
				$retarr[$index]['devicevalue'] = $retarr[$index]['devicevalue']. " ".$retarr[$index]['devicelabel'];
				$retarr[$index]['devicevalue2'] = $retarr[$index]['devicevalue2']. " ".$retarr[$index]['devicelabel2'];
				$retarr[$index]['devicevalue3'] = $retarr[$index]['devicevalue3']. " ".$retarr[$index]['devicelabel3'];
				$retarr[$index]['devicevalue4'] = $retarr[$index]['devicevalue4']. " ".$retarr[$index]['devicelabel4'];

				// sensor
				if($type == "sensors") {
					if ((strcmp($retarr[$index]['switchable'],"T") == 0) OR (strcmp($retarr[$index]['dimmable'],"T") == 0)) {
						unset($retarr[$index]);
					} else {
						$index++;
					}
				// dimmers
				} elseif ($type == "dimmers") {
					if (strcmp($retarr[$index]['dimmable'],"T") == 0) {
						$index++;
					} else {
						unset($retarr[$index]);
					}
				// switches
				} elseif ($type == "switches") {
					if (strcmp($retarr[$index]['switchable'],"T") == 0) {
						$index++;
					} else {
						unset($retarr[$index]);
					}
				// all devices
				} else {
					$index++;
				}
			}
			return $retarr;
		}
	}

    /**
    * check if the value not only contain numbers
    * This is the 'notOnlyNumbers' validator as declared in rules().
    */
    public function notOnlyNumbers($attribute,$params)
    {
        if(!preg_match('/(?!^\d+$)^.+$/', $this->$attribute))
            $this->addError($attribute, 'it cannot contain only numbers');
    }

}
