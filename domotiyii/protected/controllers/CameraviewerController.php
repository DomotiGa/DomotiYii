<?php

class CameraViewerController extends Controller
{
	public function actionIndex()
	{
               $criteria = new CDbCriteria();
                $model=new Cameras('search');
                $model->unsetAttributes(); // clear any default values

                if(isset($_GET['Cameras']))
                {
                        $model->attributes=$_GET['Cameras'];

                        if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
                        if (!empty($model->description)) $criteria->addCondition('description = "'.$model->description.'"');
                        if (!empty($model->type)) $criteria->addCondition('description = "'.$model->type.'"');
                }
		//$this->render('index');
		$this->render('index', array('model'=>$model));
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