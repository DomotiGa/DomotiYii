<?php

class ControlController extends Controller {

    public function actionIndex() {
        $crit = $this->getFilter();

        $res = Devices::model()->findAll($crit);
        $tab = array();
        foreach ($res as $obj) {
            $row = array(
                $obj->id,
                str_replace('"', "'", $obj->icon),
                $obj->name,
                $obj->locationtext,
                $this->getActions($obj),
                $obj->getValue(1),
                $obj->getValue(2),
                $obj->getValue(3),
                $obj->getValue(4),
                $obj->lastchanged,
            );

            $tab[] = $row;
        }
        if (!is_null(yii::app()->request->getParam('ajax'))) {
            $data = array('aaData' => $tab);
            die($this->renderPartial('jsonData', array('data' => $data), TRUE));
        }
        else
            $this->render('indexValues', array('data' => $tab));
    }

    public function actionList() {
        $date = yii::app()->request->getParam('date');

        $crit = $this->getFilter();

        $res = Devices::model()->findAll($crit);
        $tab = array();
        foreach ($res as $obj) {
            $row = array(
                'id' => $obj->id,
                'icon' => str_replace('"', "'", $obj->icon),
                'name' => $obj->name,
                'location' => $obj->locationtext,
                'commands' => $this->getActions($obj),
                'val1' => $obj->getValue(1),
                'val2' => $obj->getValue(2),
                'val3' => $obj->getValue(3),
                'val4' => $obj->getValue(4),
                'lastchanged' => $obj->lastchanged,
            );

            $tab[] = $row;
        }
        if (!is_null(yii::app()->request->getParam('ajax'))) {
            $data = array('aaData' => $tab);
            die($this->renderPartial('jsonData', array('data' => $data), TRUE));
        }
        else
            $this->render('list', array('data' => $tab));
    }

    private function getFilter() {
        $crit = new CDbCriteria();
        $type = yii::app()->request->getParam('type', 'control');
        $crit->order = 'name ASC';
        if ($type == 'control') {
            $crit->addCondition('enabled is TRUE');
            $crit->addCondition('hide is FALSE');
            $crit->addColumnCondition(array('switchable' => -1, 'dimable' => -1), 'OR');
        } else if ($type=='all') {
            $crit->addCondition('enabled is TRUE');
            $crit->addCondition('hide is FALSE');
        } else if ($type=='sensors') {
            $crit->addCondition('enabled is TRUE');
            $crit->addCondition('hide is FALSE');
            $crit->addColumnCondition(array('switchable' => 0, 'dimable' => 0));
        }
        return $crit;
    }

    public function actionLastChanged() {
        $crit=$this->getFilter();
        $crit->select='max(lastchanged) AS lastchanged';
        $req=Devices::model()->find($crit);
        $lastChanged = $req->lastchanged;
        die($lastChanged);
    }

    public function actionUpdateSession($allValues) {
        if ($allValues == 0) {
            unset(Yii::app()->session['allValues']);
        } else {
            Yii::app()->session['allValues'] = $allValues;
        }
        die('OK');
    }

    public function actionSetDevice() {
        $device = Yii::app()->request->getParam('device');
        $action = strip_tags(Yii::app()->request->getParam('action'));
        if (is_null($device) || is_null($action))
            return json_encode(array("jsonrpc" => "2.0", "result" => false, "id" => 1));;
        $result = $this->do_jsonrpc('{"jsonrpc": "2.0", "method": "device.set", "params": {"device_id": ' . $device . ', "value": "' . $action . '"}, "id": 1}');
        echo $result;
    }

    protected function getActions($obj) {
        $tmp = str_replace('Dim ', '', $obj->getValue(1));
        $valueOne = (!is_numeric($tmp) ? 0 : $tmp);
        $dimmer = '<div class="slider-container" style="text-align:center;margin:0px;"><input type="text" class="slider" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="' . $valueOne . '" data-slider-orientation="horizontal" data-device="' . $obj->id . '" data-slider-selection="after" data-slider-tooltip="hide">&nbsp;<span style="font-weigth:bold;"></span></div>';
        $space = '<div class="fixSpace"></div>';
        $buttons = '<button type="button" name="but" onClick="btAction(event,this)" data-action="Off" data-device="' . $obj->id . '" class="btn btn-primary btn-mini">Off</button>&nbsp;<button type="button" onClick="btAction(event,this)" data-action="On" data-device="' . $obj->id . '" class="btn btn-primary btn-mini">On</button>';
        if ($obj->switchable == -1)
            return $space . $buttons;
        else if ($obj->dimable == -1)
            return $dimmer . $buttons;
        else {
            return "";
        }
    }

    protected function do_jsonrpc($data = array()) {
        $request = $data;
        $context = stream_context_create(
            array('http' =>
                array('method' => "POST",
                    'header' => "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n",
                    'content' => $request)));
        $file = @file_get_contents(Yii::app()->params['jsonrpcHost'], false, $context);

        if ($file === FALSE) {
            // could not connect
            return json_encode(array("jsonrpc" => "2.0", "result" => false, "id" => 1));
        } else {
            return $file;
        }
    }

}
