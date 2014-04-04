<?php

class CamerasController extends Controller
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

                $type = Yii::app()->getRequest()->getParam('type');
				
				// It is beter to see all enabled cameras first.
				if (!isset($type))
				{
					$model->enabled=-1;
					$criteria->addCondition('enabled IS TRUE');				
				}
				
                if (isset($type) && !empty($type))
                {
                        if ($type == "enabled")
                        {
                                $model->enabled=-1;
                                $criteria->addCondition('enabled IS TRUE');
                        }
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
                $model = Cameras::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

        public function actionDelete($id)
        {
                // delete the entry from the "cameras" table
                $model = Cameras::model()->findByPk($id);
                $this->do_delete($model);

        }

        public function actionUpdate($id)
        {
                $model = Cameras::model()->findByPk($id);
                if(isset($_POST['Cameras']))
                {
                        $model->attributes=$_POST['Cameras'];
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
                $model=new Cameras;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Cameras']))
                {
                        $model->attributes=$_POST['Cameras'];
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
                        Yii::app()->user->setFlash('error', Yii::t('app','Camera save failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Camera saved.'));
                }
        }

        protected function do_delete($model)
        {

                if ($model->delete() === false)
                {
                        Yii::app()->user->setFlash('error', Yii::t('app','Camera delete failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Camera deleted.'));
                        $this->redirect(array('index'));
                }
        }
}
