<?php

class ContactsController extends Controller
{
	public function actionIndex()
	{
                $model = Contacts::model();
                $this->render('index', array('model'=>$model));
	}

        public function actionView($id)
        {
                $model = Contacts::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
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

        public function actionDelete($id)
        {
                // delete the entry from the "contacts" table
                $model = Contacts::model()->findByPk($id);
                $this->do_delete($model);

        }

        public function actionUpdate($id)
        {
                $model = Contacts::model()->findByPk($id);
                if(isset($_POST['Contacts']))
                {
                        $model->attributes=$_POST['Contacts'];
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

        public function actionCreate()
        {
                $model=new Contacts;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Contacts']))
                {
                        $model->attributes=$_POST['Contacts'];
                        if($model->validate())
                        {
                        	$this->do_save($model);
			}
                }
                $this->render('create',array(
                        'model'=>$model,
                ));
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

    if ( $model->save() === false ) {
       Yii::app()->user->setFlash('error', "Saving contact... Failed!");
    } else {
       Yii::app()->user->setFlash('success', "Saving contact... Successful.");
    }
}

protected function do_delete($model) {

    if ( $model->delete() === false ) {
       Yii::app()->user->setFlash('error', "Deleting contact... Failed!");
    } else {
       Yii::app()->user->setFlash('success', "Deleting contact... Successful.");
    }
}

}
