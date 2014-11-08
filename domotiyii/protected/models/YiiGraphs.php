<?php

/**
 * This is the model class for table "yiiGraphs".
 *
 * The followings are the available columns in table 'yiiGraphs':
 * @property string $id
 * @property string $name
 * @property string $enabled
 * @property string $type
 * @property string $group
 * @property string $description
 * @property string $device_value_01
 * @property string $device_value_02
 * @property string $device_value_03
 * @property string $device_value_04
 * @property string $created_date
 * @property integer $graph_width
 * @property integer $graph_height
 */
class YiiGraphs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yii_graphs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, enabled, type', 'required'),
			array('graph_width, graph_height', 'numerical', 'integerOnly'=>true),
			array('name, enabled, type, group, description', 'length', 'max'=>45),
			array('device_value_01, device_value_02, device_value_03, device_value_04', 'length', 'max'=>11),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, enabled, type, group, description, device_value_01, device_value_02, device_value_03, device_value_04, created_date, graph_width, graph_height', 'safe', 'on'=>'search'),
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
			'enabled' => 'Enabled',
			'type' => 'Type',
			'group' => 'Group',
			'description' => 'Description',
			'device_value_01' => 'Device Value 01',
			'device_value_02' => 'Device Value 02',
			'device_value_03' => 'Device Value 03',
			'device_value_04' => 'Device Value 04',
			'created_date' => 'Created Date',
			'graph_width' => 'Graph Width',
			'graph_height' => 'Graph Height',
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
		$criteria->compare('enabled',$this->enabled,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('group',$this->group,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('device_value_01',$this->device_value_01,true);
		$criteria->compare('device_value_02',$this->device_value_02,true);
		$criteria->compare('device_value_03',$this->device_value_03,true);
		$criteria->compare('device_value_04',$this->device_value_04,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('graph_width',$this->graph_width);
		$criteria->compare('graph_height',$this->graph_height);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return YiiGraphs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return array relational rules.
	 */
	public function getChartTypes()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(0=>'None', 1=>'Bar chart', 2=>'Line chart', 3=>'Gauge');
	}

    /*
      This functions returns an array with the devicevalue details.
     */
    public function getDeviceValues() {
		
        // Create sql to get the devicevalue details.
		// We only get enabled devices and the log option must be enabled on the device_value!
			$sql = "select d.id as DeviceID,
				d.name,
				dv.id as DeviceValueID,
				dv.valuenum,
				dv.value,
				concat( d.name, ' - ', dv.valuenum , ' - ' , dv.value) as Description
			FROM domotiga.devices d
			inner join domotiga.device_values dv on d.id = dv.device_id 
			where d.enabled = -1
			and dv.log = -1";

        // execute query
        $list = Yii::app()->db->createCommand($sql)->queryAll();

        $rs = array();
        foreach ($list as $item) {
            $rs[$item['DeviceValueID']] = $item['Description'];
        }
		$rs[0] = 'None';
		ksort($rs);

        return $rs;
    }
}
