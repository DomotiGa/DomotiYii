<?php

class GlobalvarsController extends Controller
{
	public function actionIndex()
	{
                $criteria = new CDbCriteria();
                $model=new Globalvars('search');
                $model->unsetAttributes(); // clear any default values

                if(isset($_GET['Globalvars']))
                {
                        $model->attributes=$_GET['Globalvars'];

                        if (!empty($model->var)) $criteria->addCondition('var = "'.$model->var.'"');
                        if (!empty($model->value)) $criteria->addCondition('value = "'.$model->value.'"');
                        if (!empty($model->datatype)) $criteria->addCondition('datatype = "'.$model->datatype.'"');
                }
		$this->render('index', array('model'=>$model));
	}

	public function actionView($id)
	{
		$model = Globalvars::model()->findByPk($id);
		$this->render('view', array('model'=>$model));
	}

        public function actionDelete($id)
        {
                // delete the entry from the "globalvars" table
                $model = Globalvars::model()->findByPk($id);
                $this->do_delete($model);

        }

        public function actionUpdate($id)
        {
                $model = Globalvars::model()->findByPk($id);
                if(isset($_POST['Globalvars']))
                {
                        $model->attributes=$_POST['Globalvars'];
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
                $model=new Globalvars;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Globalvars']))
                {
                        $model->attributes=$_POST['Globalvars'];
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
                if ($model->save() === false)
                {
                        Yii::app()->user->setFlash('error', Yii::t('app','Variable save failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Variable saved.'));
                }
        }

        protected function do_delete($model)
        {

                if ($model->delete() === false)
                {
                        Yii::app()->user->setFlash('error', Yii::t('app','Variable delete failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Variable deleted.'));
                        $this->redirect(array('index'));
                }
        }
}
