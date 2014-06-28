<?php

class AjaxUtilController extends CController {

    /**
     * Default filter for access rules
     * */
    public function filters() {
        return array(
            'accessControl',
        );
    }

    /**
     * Default access rules
     * */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user 
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionGetDeviceListSelect() {
        $id = $_GET['id'];
        foreach (Devices::getDevices() as $i => $v) {
            echo "<option value=$i " . ($id == $i ? "SELECTED" : "") . ">$v";
        }
    }

    public function actionGetDeviceLastSeen() {
        $id = $_GET['id'];
        $dev = Devices::model()->findByPk($id);
        echo $dev->lastseen;
    }

    public function actionGetGlobalVarListSelect() {
        $id = $_GET['id'];
        foreach (Globalvars::model()->findAll(array('order' => 'var')) as $m) {
            echo "<option value={$m->var} " . ($m->var == $id ? "SELECTED" : "") . ">{$m->var}";
        }
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

    public function actionLastChanged() {
        $crit = $this->getFilter();
        $crit->select = 'max(lastchanged) AS lastchanged';
        $req = Devices::model()->find($crit);
        if ($req === NULL)
            die('?');
        $lastChanged = $req->lastchanged;
        echo $lastChanged;
        yii::app()->end();
    }

    public function actionUpdateSession() {
        //TODO: dynamic will be better !!
        $name = 'allValues';
        $value = yii::app()->request->getParam('allValues');
        if ($value === NULL) {
            $name = 'fullScreen';
            $value = yii::app()->request->getParam('fullScreen');
        }
        if ($value == 0) {
            unset(Yii::app()->session[$name]);
        } else {
            Yii::app()->session[$name] = $value;
        }
        die('OK');
    }

    public function actionSetDevice() {
        $device = Yii::app()->request->getParam('device');
        $action = strip_tags(Yii::app()->request->getParam('action'));
        if (is_null($device) || is_null($action))
            return json_encode(array("jsonrpc" => "2.0", "result" => false, "id" => 1));;
        $result = doJsonRpc('{"jsonrpc": "2.0", "method": "device.set", "params": {"device_id": ' . $device . ', "value": "' . $action . '"}, "id": 1}');
        echo $result;
    }

}
