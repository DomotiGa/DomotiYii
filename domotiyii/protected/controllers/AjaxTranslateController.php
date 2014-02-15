<?php

class AjaxTranslateController extends Controller
{
	public function actionT($name)
	{
        echo json_encode(array('text'=>Yii::t('app',$name)));
    }
}
