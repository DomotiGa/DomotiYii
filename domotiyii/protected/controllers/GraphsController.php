<?php

class GraphsController extends Controller {

    public function actionIndex() {
        $crit = $this->getFilter();

        $res = Devices::model()->findAll($crit);
        $tab = array();
        foreach ($res as $obj) {
            $row = array(
                'id' => $obj->id,
                'name' => $obj->name,
                'location' => $obj->locationtext,
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
        $type = yii::app()->request->getParam('type', 'All');
        $location = yii::app()->request->getParam('location', 'All');
        $crit->order = 't.name ASC';
        if ($type == 'Control') {
            $crit->addCondition('enabled is TRUE');
            $crit->addCondition('hide is FALSE');
            $crit->addColumnCondition(array('switchable' => -1, 'dimable' => -1), 'OR');
        } else if ($type == 'All' OR $type == 'Dashboard') {
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

    public function getChartDetails($deviceid, $valuenum, $charttype) {
		
        // Create sql to get the chart details
		if ($charttype == 'COUNTER') {
			$sql = "select dv.valuerrddsname as chartname,
			dvl.value as chartvalue,
			dv.device_id as device
			from device_values dv
			inner join device_values_log dvl 
				on dv.device_id = dvl.device_id 
				and dv.valuenum = dvl.valuenum
			where dv.valuerrdtype = '" . $charttype . "'
			and dv.device_id = " . $deviceid . "
			and dv.valuenum = " . $valuenum . "
			group by dv.valuerrddsname,
			dvl.value";
		} else {
			$sql = "select now()";
		}

        // execute query
        $list = Yii::app()->db->createCommand($sql)->queryAll();

        $rs = array();
        foreach ($list as $item) {
            $row = array(
                'chartname' => $item['chartname'],
                'chartvalue' => $item['chartvalue'],
				'device' => $item['device']
            );
            $rs[] = $row;
        }
        return $rs;
    }

    public function actionGetGraphData() {
        if (isset($_GET['data'])) {
            $encryptedMysqlConnection = $_GET['data'];
        }

        if (isset($_GET['fromdate'])) {
			$fromdate = date("Y-m-d", strtotime($_GET['fromdate']));
        }

        if (isset($_GET['todate'])) {
			$todate = date("Y-m-d", strtotime($_GET['todate']));
        }
		
        if (isset($_GET['device'])) {
            $device_id = $_GET['device'];
        }

        if (isset($_GET['dev_valnum'])) {
            $dev_valnum = $_GET['dev_valnum'];
        }		

        if (isset($_GET['chartname'])) {
            $chartname = $_GET['chartname'];
        }

        if (isset($_GET['charttype'])) {
            $charttype = $_GET['charttype'];
        }
		
        if (isset($_GET['chartval'])) {
            $chartval = $_GET['chartval'];
        }

        if (isset($_GET['callback'])) {
            $callback = $_GET['callback'];
            if (!preg_match('/^[a-zA-Z0-9_]+$/', $callback)) {
                die('Invalid callback name');
            }
        }

        if (isset($_GET['start'])) {
            $start = $_GET['start'];
            if ($start && !preg_match('/^[0-9]+$/', $start)) {
                die("Invalid start parameter: $start");
            }
        } else {
            $start = 0;
        }

        if (isset($_GET['end'])) {
            $end = $_GET['end'];
            if ($end && !preg_match('/^[0-9]+$/', $end)) {
                die("Invalid end parameter: $end");
            }
        } else {
            $end = time() * 1000;
        }

        $range = $end - $start;
        $startTime = gmstrftime('%Y-%m-%d %H:%M:%S', $start / 1000);
        $endTime = gmstrftime('%Y-%m-%d %H:%M:%S', $end / 1000);

        $date_column = "unix_timestamp(CONCAT(date(dvl.lastchanged), ' ', maketime(HOUR(dvl.lastchanged),MINUTE(dvl.lastchanged),0))) * 1000";

        $sql = "select  $date_column  as datum, 
			SUM( IF( dvl.value='$chartval', 1, 0 ) ) as value1
			FROM devices d
			inner join device_values dv on d.id = dv.device_id 
			inner join device_values_log dvl on d.id = dvl.device_id and dv.valuenum = dvl.valuenum
			where dv.valuerrddsname = '$chartname'
			and d.id =$device_id
			and dvl.valuenum = $dev_valnum
			and cast( dvl.lastchanged as date) between '$fromdate' and '$todate'
			group by  $date_column 
			order by dvl.lastchanged;";
			
		if ($charttype == 'DERIVE') {
			$sql = "select  $date_column  as datum, 
				dvl.value as value1
				FROM domotiga.devices d
				inner join domotiga.device_values dv on d.id = dv.device_id 
				inner join domotiga.device_values_log dvl on d.id = dvl.device_id 
					and dv.valuenum = dvl.valuenum
				where dv.valuerrddsname = '$chartname'
				and d.id = $device_id
				and dvl.valuenum = $dev_valnum
				and cast( dvl.lastchanged as date) between '$fromdate' and '$todate'
				order by dvl.lastchanged;";
		}

// set UTC time
        Yii::app()->db->createCommand("SET time_zone = '+00:00'")->execute();

        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $rows = array();
        foreach($result as $r) {
            $rows[] = "[{$r['datum']},{$r['value1']}]";
        }

        header('Content-Type: text/javascript');

        echo $callback . "([\n" . join(",\n", $rows) . "\n]);";
    }

}