<?php

class AjaxUtilController extends Controller {

    public function actionTranslate($name) {
        echo json_encode(array('text' => Yii::t('app', $name)));
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

    public function actionSetDevice() {
        $device = Yii::app()->request->getParam('device');
        $action = strip_tags(Yii::app()->request->getParam('action'));
        if (is_null($device) || is_null($action))
            return json_encode(array("jsonrpc" => "2.0", "result" => false, "id" => 1));;
        $result = $this->do_jsonrpc('{"jsonrpc": "2.0", "method": "device.set", "params": {"device_id": ' . $device . ', "value": "' . $action . '"}, "id": 1}');
        echo $result;
    }

    //stolen from mobile (ty Jess)
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

