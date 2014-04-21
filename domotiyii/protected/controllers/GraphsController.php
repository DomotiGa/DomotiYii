<?php

class GraphsController extends Controller
{
    /**
     * Default filter for access rules
    **/
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /**
     * Default access rules
    **/
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user 
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
     }

    public function init() {
        parent::init();
        Yii::app()->layout = '//layouts/normal';
    }
	
	public function actionIndex()
	{
        $crit = $this->getFilter();

        $res = Devices::model()->findAll($crit);
        $tab = array();
        foreach ($res as $obj) {
            $row = array(
                'id' => $obj->id,
                'icon' => str_replace('"', "'", $obj->icon),
                'name' => $obj->name,
                'location' => $obj->locationtext,
                //'commands' => $this->getActions($obj),
                //'val1' => $obj->getValue(1),
                //'val2' => $obj->getValue(2),
                //'val3' => $obj->getValue(3),
                //'val4' => $obj->getValue(4),
                'lastchanged' => $obj->lastchanged
            );

            $tab[] = $row;
        }
        if (!is_null(yii::app()->request->getParam('ajax'))) {
            $data = array('aaData' => $tab);
            die($this->renderPartial('jsonData', array('data' => $data), TRUE));
        }
        else
            $this->render('index', array('data' => $tab));
	}
	
	private function getFilter() {
        $crit = new CDbCriteria();
        $type = yii::app()->request->getParam('type', 'Control');
        $location = yii::app()->request->getParam('location', 'All');
        $crit->order = 't.name ASC';
        if ($type == 'Control') {
            $crit->addCondition('enabled is TRUE');
            $crit->addCondition('hide is FALSE');
            $crit->addColumnCondition(array('switchable' => -1, 'dimable' => -1), 'OR');
        } else if ($type == 'All') {
            $crit->addCondition('enabled is TRUE');
            $crit->addCondition('hide is FALSE');
        } else if ($type == 'Sensors') {
            $crit->addCondition('enabled is TRUE');
            $crit->addCondition('hide is FALSE');
            $crit->addColumnCondition(array('switchable' => 0, 'dimable' => 0));
        }
        if ($location !== 'All') {
            $crit->with = 'l_location';
            $crit->addCondition("l_location.name='$location'");
        }
        return $crit;
    }

	/*
		This functions returns an array with the chart details set in the device value log.
	*/
	public function getChartDetails($deviceid) {
		
		// Get database name
		$config = Yii::app()->getComponents(false);
		$dbname = explode(";", $config['db']->connectionString);
		$database = substr($dbname[1], strpos($dbname[1], '=')+1 );
		
		// Create sql to get the chart details
		$sql = "select dv.valuerrddsname as chartname,
		dvl.value as chartvalue
		from ".$database.".device_values dv
		inner join ".$database.".device_values_log dvl 
			on dv.device_id = dvl.device_id 
			and dv.valuenum = dvl.valuenum
		where valuerrdtype = 'COUNTER'
		and dv.device_id = " .	$deviceid . "
		group by dv.valuerrddsname,
		dvl.value";
		
		// execute query
		$list= Yii::app()->db->createCommand($sql)->queryAll();

		$rs=array();
		foreach($list as $item){
            $row = array(
                'chartname' => $item['chartname'],
				'chartvalue' => $item['chartvalue']
            );
			$rs[] = $row;
		}
		return $rs;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}