<?php

class CmdController extends Controller {

    public function actionIndex() {
        $date = yii::app()->request->getParam('date');
        $model = new Devices('search');
        $model->unsetAttributes(); // clear any default values

        $model->enabled = -1;
        $model->hide = 0;
        
        $dp = $model->search();
        $dp->setPagination(FALSE);
        $tab = array();
        foreach ($dp->getData() as $obj) {
            $row = array(
                $obj->id,
                str_replace('"', "'", $obj->icon),
                $obj->name,
                $obj->locationtext,
                $obj->getButtons(), //"<button type='button' class='butOn btn btn-primary btn-mini'>On</button>&nbsp;<button type='button' class='butOff btn btn-primary btn-mini'>Off</button>",
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

    public function actionLastChanged() {
        $lastChanged = Yii::app()->db
            ->createCommand("SELECT lastchanged FROM devices ORDER BY lastchanged DESC LIMIT 1")
            ->where('enabled=:cond1 and hide=:cond2', array(':cond1' => -1,':cond2' => 0))
            ->queryScalar();
        die($lastChanged);
    }

    public function actionSetDevice() {
        $device = Yii::app()->request->getParam('device');
        $action = strip_tags(Yii::app()->request->getParam('action'));
        if (is_null($device) || is_null($action))
            return json_encode(array("jsonrpc" => "2.0", "result" => false, "id" => 1));;
        $result = $this->do_jsonrpc('{"jsonrpc": "2.0", "method": "device.set", "params": {"device_id": ' . $device . ', "value": "' . $action . '"}, "id": 1}');
        echo $result;
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
