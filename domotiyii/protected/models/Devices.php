<?php

/**
 * This is the model class for table "devices".
 *
 * The followings are the available columns in table 'devices':
 * @property string $id
 * @property string $name
 * @property string $address
 * @property integer $devicetype_id
 * @property integer $location_id
 * @property string $onicon
 * @property string $officon
 * @property string $dimicon
 * @property integer $interface_id
 * @property string $firstseen
 * @property string $lastseen
 * @property boolean $enabled
 * @property boolean $hide
 * @property string $groups
 * @property boolean $rrd
 * @property boolean $graph
 * @property string $batterystatus
 * @property integer $tampered
 * @property string $comments
 * @property boolean $switchable
 * @property boolean $dimable
 * @property boolean $extcode
 * @property integer $x
 * @property integer $y
 * @property integer $floorplan_id
 * @property integer $instance_id
 * @property string $lastchanged
 * @property integer $repeatstate
 * @property integer $repeatperiod
 * @property integer $reset
 * @property integer $resetperiod
 * @property string $resetvalue
 * @property boolean $poll
 */
class Devices extends CActiveRecord {

    /**
     * used by protocol combobox inside device editor
     */
    public $protocol;

    /**
     * @return dropdownlist with the list of devices (used in temperaturenu, bwired, pachube devices)
     */
    public static function getDevices() {
        return CHtml::listData(Devices::model()->findAll(array('order' => 'name ASC')), 'id', 'name');
    }

    /**
     * @return array of groups list to be directly usable in form
     */
    public function getGroupsArray() {
        return explode('|', $this->groups);
    }

    /**
     * @return get last value
     
    public function getValue($n) {
        $val = DeviceValues::model()->find("device_id='{$this->id}' and valuenum=$n");
        if ($val !== NULL)
            return $val->value;
        else
            return "";
    }*/


    /**
     * @return button OnOff
     */
    public function getButtons() {
        $buttons = '<button type="button" name="but" onClick="btAction(event,this)" data-action="Off" data-device="' . $this->id . '" class="btn btn-primary btn-mini">Off</button>&nbsp;<button type="button" onClick="btAction(event,this)" data-action="On" data-device="' . $this->id . '" class="btn btn-primary btn-mini">On</button>';
        if ($this->switchable == -1)
            return $buttons;
        else {
            return "";
        }
    }

    /**
     * @return icon path for a device
     */
    public function getIcon() {
        if (isset($this->deviceValue1->value)) {
            if ($this->deviceValue1->value === 'On')
                $icon = $this->onicon;
            else
            if (strpos($this->deviceValue1->value, 'Dim') !== FALSE)
                $icon = $this->dimicon;
            else
                $icon = $this->officon;
            if ($icon === NULL || empty($icon))
                return "";
            $imageSrc = Yii::app()->homeUrl . 'static/icons/' . $icon;
            return '<img src="' . $imageSrc . '">';
        } else {
            return "";
        }
    }

    /**
     * @return dropdownlist with the list of devicetypes
     */
    public function getDeviceTypes() {
        return CHtml::listData(Devicetypes::model()->findAll(array('order' => 'name ASC')), 'id', 'name');
    }

    /**
     * @return dropdownlist with the list of devicetypes protocols
     */
    public function getDeviceProtocols() {
        return CHtml::listData(Devicetypes::model()->findAll(array('select' => 'protocol', 'order' => 'protocol ASC', 'distinct' => true)), 'protocol', 'protocol');
    }

    /**
     * @return dropdownlist with the list of interfaces
     */
    public function getInterfaces() {
        return CHtml::listData(Plugins::model()->findAll(array('order' => 'interface ASC')), 'id', 'interface');
    }

    /**
     * @return dropdownlist with the list of interfaces, based on the device model id eg 112
     */
    public function getInterfacesByDeviceModel($id) {
        $devicetype = Devicetypes::model()->find('id=:id', array(':id' => $id,));
        if ($devicetype === null) {
            return CHtml::listData(Plugins::model(), 'id', 'interface');
        } else {
            return CHtml::listData(Plugins::model()->findAll("protocols LIKE '%" . $devicetype->protocol . "%'", array('order' => 'interface ASC')), 'id', 'interface');
        }
    }

    /**
     * @return dropdownlist with the list of interfaces, based on the protocol eg '1-Wire'
     */
    public function getInterfacesByProtocol($protocol) {
        return CHtml::listData(Plugins::model()->findAll("protocols LIKE '%" . $protocol . "%'", array('order' => 'interface ASC')), 'id', 'interface');
    }

    /**
     * @return dropdownlist with the list of devices, based on the DeviceType
     */
    public function getDeviceTypesByType($protocol) {
        return CHtml::listData(Devicetypes::model()->findAll("protocol LIKE '%" . $protocol . "%'", array('order' => 'name ASC')), 'id', 'name');
    }

    /**
     * @return dropdownlist with the list of locations
     */
    public function getLocations() {
        return CHtml::listData(Locations::model()->findAll(array('order' => 'name ASC')), 'id', 'name');
    }

    /**
     * @return dropdownlist with the list of locations
     */
    public function getIcons() {
        $lst = glob('static/icons/*.*');
        $listSelect = array();
        $listSelect[""] = "";
        foreach ($lst as $l) {
            $l = str_replace('static/icons/', '', $l);
            $listSelect[$l] = $l;
        }
        return $listSelect;
    }

    /**
     * @return dropdownlist options with the list of locations for the images
     */
    public function getIconsOptions() {
        $lst = glob('static/icons/*.*');
        $listSelect = array();
        $listSelect[""] = "";
        foreach ($lst as $l) {
            $l = str_replace('static/icons/', '', $l);
            $option[$l] = array("data-image" => '/domotiyii/static/icons/' . $l);
        }
        $options["options"] = $option;
        return $options;
    }

    /**
     * @return dropdownlist with the list of types/protocols
     */
    public function getTypes() {
        return CHtml::listData(Devicetypes::model()->findAll(), 'protocol', 'protocol');
    }

    /**
     * @return dropdownlist with the list of floorplans
     */
    public function getFloors() {
        return CHtml::listData(Floors::model()->findAll(array('order' => 'name ASC')), 'floor', 'name');
    }

    public function getFloor() {
        return (is_null(Floors::model()->findByPk($this->floorplan_id))?"":Floors::model()->findByPk($this->floorplan_id)->name);
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Devices the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'devices';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('devicetype_id, location_id, instance_id, interface_id, tampered, extcode, x, y, floorplan_id, repeatperiod, resetperiod, poll', 'numerical', 'integerOnly' => true),
            array('name, onicon, officon, dimicon, batterystatus', 'length', 'max' => 32),
            array('enabled, hide, switchable, dimable, extcode, repeatstate, reset', 'boolean', 'trueValue' => -1),
            array('name', 'notOnlyNumbers'),
            array('address', 'length', 'max' => 64),
            array('groups', 'length', 'max' => 128),
            array('firstseen, lastseen, comments, lastchanged, resetvalue', 'safe'),
            array('name, devicetype_id, interface_id, address', 'required'),
            array('name', 'unique', 'caseSensitive' => false),
//			array('address', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, address, devicetype_id, location, onicon, officon, dimicon, interface, firstseen, lastseen, enabled, hide, groups, batterystatus, tampered, comments, switchable, dimable, extcode, x, y, floorplan, lastchanged, repeatstate, repeatperiod, reset, resetperiod, resetvalue, poll', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'devicetype' => array(self::BELONGS_TO, 'Devicetypes', 'devicetype_id'),
            'l_location' => array(self::BELONGS_TO, 'Locations', 'location_id'),
            'l_interface' => array(self::BELONGS_TO, 'Plugins', 'interface_id'),
            'devicevalues' => array(self::HAS_MANY, 'DeviceValues', 'device_id'),
            'deviceValue1' => array(self::HAS_ONE, 'DeviceValues', 'device_id','on'=>'valuenum=1'),
            'deviceValue2' => array(self::HAS_ONE, 'DeviceValues', 'device_id','on'=>'valuenum=2'),
            'deviceValue3' => array(self::HAS_ONE, 'DeviceValues', 'device_id','on'=>'valuenum=3'),
            'deviceValue4' => array(self::HAS_ONE, 'DeviceValues', 'device_id','on'=>'valuenum=4'),
        );
    }

    public function getSPdevice() {
        if ($this->devicetype_id == 243)
            return TRUE;
        else if (strpos($this->deviceValue1->value, 'SP ') === 0)
            return TRUE;
        else
            return FALSE;
    }

    public function scopes() {
        return array(
            'SPdevice' => array(
                'condition' => "devicetype_id=243",
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'devicetype' => Yii::t('app', 'DeviceType'),
            'location_id' => Yii::t('app', 'Location'),
            'l_location.name' => Yii::t('app', 'Location'),
            'onicon' => Yii::t('app', 'On icon'),
            'officon' => Yii::t('app', 'Off icon'),
            'dimicon' => Yii::t('app', 'Dim icon'),
            'interface_id' => Yii::t('app', 'Interface'),
            'l_interface.name' => Yii::t('app', 'Interface'),
            'firstseen' => Yii::t('app', 'First seen'),
            'lastseen' => Yii::t('app', 'Last seen'),
            'enabled' => Yii::t('app', 'Enabled'),
            'hide' => Yii::t('app', 'Hide device'),
            'groups' => Yii::t('app', 'Groups'),
            'batterystatus' => Yii::t('app', 'Battery status'),
            'tampered' => Yii::t('app', 'Tampered'),
            'comments' => Yii::t('app', 'Comments'),
            'switchable' => Yii::t('app', 'Device can be switched'),
            'dimable' => Yii::t('app', 'Device can be dimmed'),
            'extcode' => Yii::t('app', 'Supports extended X10'),
            'x' => Yii::t('app', 'X'),
            'y' => Yii::t('app', 'Y'),
            'floorplan_id' => Yii::t('app', 'Floorplan'),
            'lastchanged' => Yii::t('app', 'Last changed'),
            'repeatstate' => Yii::t('app', 'Repeat state enabled'),
            'repeatperiod' => Yii::t('app', 'Repeat period'),
            'reset' => Yii::t('app', 'Reset status enabled'),
            'resetperiod' => Yii::t('app', 'Reset period'),
            'resetvalue' => Yii::t('app', 'Reset value'),
            'poll' => Yii::t('app', 'Poll device (ZWave only)'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($enablepagination = true) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('devicetype_id', $this->devicetype_id);
        $criteria->compare('location_id', $this->location_id);
        $criteria->compare('onicon', $this->onicon, true);
        $criteria->compare('officon', $this->officon, true);
        $criteria->compare('dimicon', $this->dimicon, true);
        $criteria->compare('interface_id', $this->interface_id);
        $criteria->compare('instance_id', $this->instance_id);
        $criteria->compare('firstseen', $this->firstseen, true);
        $criteria->compare('lastseen', $this->lastseen, true);
        $criteria->compare('enabled', $this->enabled);
        $criteria->compare('hide', $this->hide);
        $criteria->compare('groups', $this->groups, true);
        $criteria->compare('batterystatus', $this->batterystatus, true);
        $criteria->compare('tampered', $this->tampered);
        $criteria->compare('comments', $this->comments, true);
        $criteria->compare('switchable', $this->switchable);
        $criteria->compare('dimable', $this->dimable);
        $criteria->compare('extcode', $this->extcode);
        $criteria->compare('x', $this->x);
        $criteria->compare('y', $this->y);
        $criteria->compare('floorplan_id', $this->floorplan_id);
        $criteria->compare('lastchanged', $this->lastchanged, true);
        $criteria->compare('repeatstate', $this->repeatstate);
        $criteria->compare('repeatperiod', $this->repeatperiod);
        $criteria->compare('reset', $this->reset);
        $criteria->compare('resetperiod', $this->resetperiod);
        $criteria->compare('resetvalue', $this->resetvalue, true);
        $criteria->compare('poll', $this->poll);

        if ($enablepagination) {
            return new CActiveDataProvider($this, array(
                'pagination' => array(
                    'pageSize' => Yii::app()->params['pagesizeDevices'],
                ),
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => 'name ASC',
                ),
            ));
        } else {
            return new CActiveDataProvider($this, array(
                'pagination' => false,
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => 'name ASC',
                ),
            ));
        }
    }

    /**
     * Check if the value is not empty and does not only contain numbers
     * This is the 'notOnlyNumbers' validator as declared in rules().
     */
    public function notOnlyNumbers($attribute, $params) {
        if (!strlen($this->$attribute)) {
            $this->addError($attribute, $this->getAttributeLabel($attribute) . " " . Yii::t('app', 'cannot be blank.'));
        } else {
            if (!preg_match('/(?!^\d+$)^.+$/', $this->$attribute))
                $this->addError($attribute, $this->getAttributeLabel($attribute) . " " . Yii::t('app', 'not allowed to only contain numbers.'));
        }
    }

    /**
     * Location Name
     */
    public function getLocationText() {
        if (!empty($this->l_location->name)) {
            return $this->l_location->name;
        }
    }

    /**
     * Replace date with 'Today'
     */
    public function getLastSeenText() {
        return str_replace(date("Y-m-d"), "", $this->lastseen);
    }

}
