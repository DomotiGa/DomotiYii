<?php

class EventsController extends Controller
{
        public function actionIndex()
        {
                $criteria = new CDbCriteria();
                $model=new Events('search');
                $model->unsetAttributes(); // clear any default values

                if(isset($_GET['Events']))
                {
                        $model->attributes=$_GET['Events'];

                        if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
                        if (!empty($model->description)) $criteria->addCondition('description = "'.$model->description.'"');
                        if (!empty($model->type)) $criteria->addCondition('type = "'.$model->type.'"');
                }

                $type = Yii::app()->getRequest()->getParam('type');
  
		if (isset($type) && !empty($type))
		{
			if ($type == "disabled")
			{
				$model->enabled=0;
				$criteria->addCondition('enabled IS FALSE');
                        }
		} 
                $this->render('index', array('model'=>$model));
        }

        public function actionView($id)
        {
                $model = Events::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

        public function actionUpdate($id)
        {
                $model = Events::model()->findByPk($id);
                if(isset($_POST['Events']))
                {
                        $model->attributes=$_POST['Events'];
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
                // delete the entry from the "events" table
                $model = Events::model()->findByPk($id);
                $this->do_delete($model);

        }

        public function actionCreate()
        {
                $model=new Events;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Events']))
                {
                        $model->attributes=$_POST['Events'];
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
			Yii::app()->user->setFlash('error', "Saving event... Failed!");
		} else {
			Yii::app()->user->setFlash('success', "Saving event... Successful.");
		}
	}

	protected function do_delete($model)
	{

		if ( $model->delete() === false )
		{
			Yii::app()->user->setFlash('error', "Deleting event... Failed!");
		} else {
			Yii::app()->user->setFlash('success', "Deleting event... Successful.");
		}
	}
}
