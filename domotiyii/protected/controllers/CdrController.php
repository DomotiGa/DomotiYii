<?php

class CdrController extends Controller
{
	public function actionIndex()
	{
	     $model = Cdr::model();
             $this->render('index', array('model'=>$model));
	}

	public function actionIncoming()
	{
	     $model = Cdr::model();
             $this->render('incoming', array('model'=>$model));
	}

	public function actionOutgoing()
	{
	     $model = Cdr::model();
             $this->render('outgoing', array('model'=>$model));
	}

	public function actionNoanswer()
	{
	     $model = Cdr::model();
             $this->render('noanswer', array('model'=>$model));
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
