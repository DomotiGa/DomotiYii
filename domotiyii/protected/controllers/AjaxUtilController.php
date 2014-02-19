<?php

class AjaxUtilController extends Controller
{
	public function actionTranslate($name)
	{
        echo json_encode(array('text'=>Yii::t('app',$name)));
    }
    public function actionGetDeviceListSelect() {
        $id=$_GET['id'];
        foreach(Devices::getDevices() as $i=>$v) {
            echo "<option value=$i ".($id==$i?"SELECTED":"").">$v";
        }
    }
}
