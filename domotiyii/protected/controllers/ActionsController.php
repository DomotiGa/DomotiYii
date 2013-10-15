<?php

class ActionsController extends Controller
{
	/**
 	* Lists all actions.
	*/
	public function actionIndex()
	{
		$session=new CHttpSession;
		$session->open();           
		$criteria = new CDbCriteria();            

		$model=new Actions('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['Actions']))
		{
			$model->attributes=$_GET['Actions'];

			if (!empty($model->id)) $criteria->addCondition('id = "'.$model->id.'"');
			if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
			if (!empty($model->description)) $criteria->addCondition('description = "'.$model->description.'"');
			if (!empty($model->type)) $criteria->addCondition('type = "'.$model->type.'"');
		}
		$session['Actions_records']=Actions::model()->findAll($criteria); 
		$this->render('index', array('model'=>$model,));
	}

        public function actionView($id)
        {
                $model = Actions::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

        public function actionUpdate($id)
        {
                $model = Actions::model()->findByPk($id);
                if(isset($_POST['Actions']))
                {
                        $model->attributes=$_POST['Actions'];
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

        public function actionActions()
        {
            $model = Actions::model()->findByPk(1);

            if(isset($_POST['Actions']))
            {
                $model->attributes=$_POST['Actions'];
                if($model->validate())
                {
                    // form inputs are valid, do something here
                    $model->save();
                }
            }
            $this->render('actions',array('model'=>$model));
        }

        public function actionDelete($id)
        {
                // delete the entry from the "actions" table
                $model = Actions::model()->findByPk($id);
                $this->do_delete($model);
	}

        public function actionCreate()
        {
                $model=new Actions;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Actions']))
                {
                        $model->attributes=$_POST['Actions'];
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

        protected function do_save($model)
        {
                if ( $model->save() === false )
                {
                        Yii::app()->user->setFlash('error', "Saving action... Failed!");
                } else {
                        Yii::app()->user->setFlash('success', "Saving action... Successful.");
                }
        }

        protected function do_delete($model)
        {

                if ( $model->delete() === false )
                {
                        Yii::app()->user->setFlash('error', "Deleting action... Failed!");
                } else {
                        Yii::app()->user->setFlash('success', "Deleting action... Successful.");
                }
        }

}
