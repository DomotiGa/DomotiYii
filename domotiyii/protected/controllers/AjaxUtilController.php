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
    public function actionGetDeviceLastSeen() {
        $id=$_GET['id'];
        $dev=  Devices::model()->findByPk($id);
        echo $dev->lastseen;
    }
    public function actionGetGlobalVarListSelect() {
        $id=$_GET['id'];
        foreach(Globalvars::model()->findAll(array('order'=>'var')) as $m) {
            echo "<option value={$m->var} ".($m->var==$id?"SELECTED":"").">{$m->var}";
        }
    }
    
}
