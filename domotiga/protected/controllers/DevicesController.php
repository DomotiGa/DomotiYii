<?php

class DevicesController extends Controller
{
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

	public function actionUpdate($id)
	{
    		$model = Devices::model()->findByPk($id);
		$this->render('update', array('model'=>$model));

		if(isset($_POST['Devices']))
		{
			$model->attributes=$_POST['Devices'];
			if($model->validate())
			{
				// form inputs are valid, do something here
				$this->do_save($model);
			}
		}

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
protected function do_save($model) {

    if ( $model->save() === FALSE ) {
       Yii::app()->user->setFlash('error', "Saving settings... Failed!");
    } else {
       Yii::app()->user->setFlash('success', "Saving settings... Successful.");
    }
}

}
