<?php

class PluginsController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$model=new Plugins('search');
		$model->unsetAttributes(); // clear any default values

		if(isset($_GET['Plugins']))
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
}
