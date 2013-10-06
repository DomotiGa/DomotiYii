<?php

class DevicesController extends Controller
{
	public function actionControl()
	{
    		$model = Devices::model();
		$this->render('control', array('model'=>$model));
	}

	public function actionIndex()
	{
    		$model = Devices::model();
		$this->render('index', array('model'=>$model));
	}

	public function actionDimmers()
	{
    		$model = Devices::model();
		$this->render('dimmers', array('model'=>$model));
	}

	public function actionSwitches()
	{
    		$model = Devices::model();
		$this->render('switches', array('model'=>$model));
	}

	public function actionSensors()
	{
    		$model = Devices::model();
		$this->render('sensors', array('model'=>$model));
	}

        public function actionView($id)
        {
                $model = Devices::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

	public function actionUpdate($id)
	{
    		$model = Devices::model()->findByPk($id);
		if(isset($_POST['Devices']))
		{
			$model->attributes=$_POST['Devices'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				$this->do_save($model);
			}
		}
                $this->render('update',array(
                        'model'=>$model,
                ));
	}

	public function actionDelete($id)
	{
		// delete the related entries from the "devices_log" table first
		$model = DevicesLog::model()->deleteAll("deviceid ='" . $id . "'");

		// delete the entry from the "devices" table
		$model = Devices::model()->findByPk($id);
		$this->do_delete($model);
		
	}

	public function actionUpdateModule()
	{
		// update "#interface", todo "addressformat" and "devicegroup"
		if(isset($_POST['Devices']['module']))
		{
			Yii::log("devices-module");
			$moduleid = $_POST['Devices']['module'];
			echo CHtml::DropDownList("interface", 'id', Devices::model()->getInterfacesByDeviceType($moduleid));
		}
	}

	public function actionUpdateInterface()
	{
		// update "#module"
		if(isset($_POST['Devices']['interface']))
		{
			Yii::log("devices-interface");
		}
	}

        public function actionCreate()
        {
                $model=new Devices;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Devices']))
                {
                        $model->attributes=$_POST['Devices'];
                        if($model->validate())
                        {
                                $this->do_save($model);
                        }
                }
                $this->render('create',array(
                        'model'=>$model,
                ));
        }

protected function do_save($model) {

    if ( $model->save() === false ) {
       Yii::app()->user->setFlash('error', "Saving device... Failed!");
    } else {
       Yii::app()->user->setFlash('success', "Saving device... Successful.");
    }
}

protected function do_delete($model) {

    if ( $model->delete() === false ) {
       Yii::app()->user->setFlash('error', "Deleting device... Failed!");
    } else {
       Yii::app()->user->setFlash('success', "Deleting device... Successful.");
    }
}

}
