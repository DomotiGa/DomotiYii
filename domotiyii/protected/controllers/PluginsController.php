<?php

class PluginsController extends Controller
{
	public function actionIndex()
	{
                $criteria = new CDbCriteria();
                $model=new Plugins('search');
                $model->unsetAttributes(); // clear any default values

                if(isset($_GET['Interfaces']))
                {
                        $model->attributes=$_GET['Plugins'];

                        if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
                        if (!empty($model->type)) $criteria->addCondition('type = "'.$model->type.'"');
                        if (!empty($model->protocols)) $criteria->addCondition('protocols = "'.$model->protocols.'"');
                        if (!empty($model->interface)) $criteria->addCondition('interface = "'.$model->interface.'"');
                }
		$this->render('index', array('model'=>$model));
	}

	public function actionView($id)
	{
		$model = Plugins::model()->findByPk($id);
		$this->render('view', array('model'=>$model));
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
