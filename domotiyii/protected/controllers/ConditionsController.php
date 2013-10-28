<?php

class ConditionsController extends Controller
{
        public function actionIndex()
        {
                $criteria = new CDbCriteria();
                $model=new Conditions('search');
                $model->unsetAttributes(); // clear any default values

                if(isset($_GET['Conditions']))
                {
                        $model->attributes=$_GET['Conditions'];

                        if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
                        if (!empty($model->description)) $criteria->addCondition('description = "'.$model->description.'"');
                        if (!empty($model->formula)) $criteria->addCondition('formula = "'.$model->formula.'"');
                }
                $this->render('index', array('model'=>$model));
        }

        public function actionView($id)
        {
                $model = Conditions::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

        public function actionUpdate($id)
        {
                $model = Conditions::model()->findByPk($id);
                if(isset($_POST['Conditions']))
                {
                        $model->attributes=$_POST['Conditions'];
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
                // delete the entry from the "conditions" table
                $model = Conditions::model()->findByPk($id);
                $this->do_delete($model);
        }

        public function actionCreate()
        {
                $model=new Conditions;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Conditions']))
                {
                        $model->attributes=$_POST['Conditions'];
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
                        Yii::app()->user->setFlash('error', Yii::t('app','Condition save failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Condition saved.'));
                }
        }

        protected function do_delete($model)
        {
                if ($model->delete() === false)
                {
                        Yii::app()->user->setFlash('error', Yii::t('app','Condition delete failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Condition deleted.'));
                        $this->redirect(array('index'));
                }
        }
}
