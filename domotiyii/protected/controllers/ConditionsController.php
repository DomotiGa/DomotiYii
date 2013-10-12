<?php

class ConditionsController extends Controller
{
        public function actionIndex()
        {
                $model = Conditions::model();
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

        public function actionConditions()
        {
            $model = Conditions::model()->findByPk(1);

            if(isset($_POST['Conditions']))
            {
                $model->attributes=$_POST['Conditions'];
                if($model->validate())
                {
                    // form inputs are valid, do something here
                    $model->save();
                }
            }
            $this->render('conditions',array('model'=>$model));
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
                if ( $model->save() === false )
                {
                        Yii::app()->user->setFlash('error', "Saving condition... Failed!");
                } else {
                        Yii::app()->user->setFlash('success', "Saving condition... Successful.");
                }
        }

        protected function do_delete($model)
        {

                if ( $model->delete() === false )
                {
                        Yii::app()->user->setFlash('error', "Deleting condition... Failed!");
                } else {
                        Yii::app()->user->setFlash('success', "Deleting condition... Successful.");
                }
        }

}
