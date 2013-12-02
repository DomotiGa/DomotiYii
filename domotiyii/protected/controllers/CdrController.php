<?php

class CdrController extends Controller
{
    // overwrite default rules
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user 
                'users'=>array('@'),
            ),
            array('allow', // allow everybody to see telephone 
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

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
