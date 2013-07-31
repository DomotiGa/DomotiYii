<?php

class ContactsController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionContacts()
	{
	    $model = Contacts::model()->findByPk(1);

	    if(isset($_POST['Contacts']))
	    {
	        $model->attributes=$_POST['Contacts'];
	        if($model->validate())
	        {
	            // form inputs are valid, do something here
	            $model->save();
	        }
	    }
	    $this->render('contacts',array('model'=>$model));
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
