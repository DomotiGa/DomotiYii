<?php

/**
 * This is the model class for table "device_values".
 *
 * The followings are the available columns in table 'device_values':
 * @property string $id
 * @property string $device_id
 * @property string $valuenum
 * @property string $value
 * @property string $correction
 * @property string $units
 * @property boolean $log
 * @property boolean $logdisplay
 * @property boolean $logspeak
 * @property boolean $rrd
 * @property boolean $graph
 * @property string $valuerrddsname
 * @property string $valuerrdtype
 * @property string $lastchanged
 * @property string $lastseen
 * @property string $type
 * @property string $description
 */
class DeviceValues extends CActiveRecord
{

    /**
    * @return dropdownlist with the list of device
    */
    public function getDevices()
    {
    	return CHtml::listData(Devices::model()->findAll(array('order'=>'name')), 'id', 'name');
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'device_values';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('device_id, valuenum', 'required'),
            array('device_id, valuenum, type', 'length', 'max'=>11),
            array('units, valuerrddsname, valuerrdtype, description', 'length', 'max'=>32),
            array('log, logdisplay, logspeak, rrd, graph', 'boolean', 'trueValue'=> -1),
            array('value, correction, log, logdisplay, logspeak, rrd, graph, lastchanged, lastseen', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, device_id, valuenum, value, correction, units, log, logdisplay, logspeak, rrd, graph, valuerrddsname, valuerrdtype, lastchanged, lastseen', 'safe', 'on'=>'search'),
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
		'device' => array(self::BELONGS_TO, 'Devices', 'device_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'device_id' => 'Deviceid',
            'device' => 'Device',
            'valuenum' => 'Valuenum',
            'value' => 'Value',
            'correction' => 'Correction',
            'units' => 'Units',
            'log' => 'Log',
            'logdisplay' => 'Logdisplay',
            'logspeak' => 'Logspeak',
            'rrd' => 'Rrd',
            'graph' => 'Graph',
            'valuerrddsname' => 'Valuerrddsname',
            'valuerrdtype' => 'Valuerrdtype',
            'lastchanged' => 'Lastchanged',
            'lastseen' => 'Lastseen',
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
        $criteria->compare('device_id',$this->device_id,false);
        $criteria->compare('valuenum',$this->valuenum,true);
        $criteria->compare('value',$this->value,true);
        $criteria->compare('correction',$this->correction,true);
        $criteria->compare('units',$this->units,true);
        $criteria->compare('log',$this->log);
        $criteria->compare('logdisplay',$this->logdisplay);
        $criteria->compare('logspeak',$this->logspeak);
        $criteria->compare('rrd',$this->rrd);
        $criteria->compare('graph',$this->graph);
        $criteria->compare('valuerrddsname',$this->valuerrddsname,true);
        $criteria->compare('valuerrdtype',$this->valuerrdtype,true);
        $criteria->compare('lastchanged',$this->lastchanged,true);
        $criteria->compare('lastseen',$this->lastseen,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DeviceValues the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}

?>
