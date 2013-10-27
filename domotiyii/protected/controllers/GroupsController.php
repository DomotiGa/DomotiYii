<?php

class GroupsController extends Controller
{
        public function actionIndex()
        {
                $criteria = new CDbCriteria();
                $model=new Groups('search');
                $model->unsetAttributes(); // clear any default values

                if(isset($_GET['Groups']))
                {
                        $model->attributes=$_GET['Groups'];

                        if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
                }
                $this->render('index', array('model'=>$model));
        }

        public function actionView($id)
        {
                $model = Groups::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

        public function actionDelete($id)
        {
                // delete the entry from the "groups" table
                $model = Groups::model()->findByPk($id);
                $this->do_delete($model);

        }

        public function actionUpdate($id)
        {
                $model = Groups::model()->findByPk($id);
                if(isset($_POST['Groups']))
                {
                        $model->attributes=$_POST['Groups'];
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
                $model=new Groups;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Groups']))
                {
                        $model->attributes=$_POST['Groups'];
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
                        Yii::app()->user->setFlash('error', Yii::t('app','Group save failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Group saved.'));
                }
        }

        protected function do_delete($model)
        {

                if ($model->delete() === false)
                {
                        Yii::app()->user->setFlash('error', Yii::t('app','Group delete failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Group deleted.'));
                }
        }
}
