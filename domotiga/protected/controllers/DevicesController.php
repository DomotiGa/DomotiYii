<?php

class DevicesController extends Controller
{

public function renderButtons() {
   $this->widget('bootstrap.widgets.TbButtonGroup', array(
    'size'=>'large',
    'type'=>'inverse', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'buttons'=>array(
       array('label'=>'Inverse', 'items'=>array(
       array('label'=>'Action', 'url'=>'#'),
       array('label'=>'Another action', 'url'=>'#'),
       array('label'=>'Something else', 'url'=>'#'),
       '---',
       array('label'=>'Separate link', 'url'=>'#'),
    )),
    ),
));
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
}
