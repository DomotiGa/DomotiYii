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

}
