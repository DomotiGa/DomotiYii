<?php

class UsersController extends Controller
{
        public function actionIndex()
        {
                $criteria = new CDbCriteria();
                $model=new Users('search');
                $model->unsetAttributes(); // clear any default values

                if(isset($_GET['Users']))
                {
                        $model->attributes=$_GET['Users'];

                        if (!empty($model->username)) $criteria->addCondition('username = "'.$model->username.'"');
                        if (!empty($model->fullname)) $criteria->addCondition('fullname = "'.$model->fullname.'"');
                }
                $this->render('index', array('model'=>$model));
        }

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionView($id)
        {
                $model = Users::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			//$model->password = $model->hashPassword($_POST['Users']['password'], $_POST['Users']['password']);
			if($model->validate())
			{
				$model->do_save($model);
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

        public function actionUpdate($id)
        {
                $model = Users::model()->findByPk($id);
                if(isset($_POST['Users']))
                {
                        $model->attributes=$_POST['Users'];
			//$model->password = $model->hashPassword($_POST['Users']['password'], $_POST['Users']['password']);
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
                // delete the entry from the "users" table
                $model = Users::model()->findByPk($id);
                $this->do_delete($model);
        }

        protected function do_save($model)
        {
                if ($model->save() === false)
                {
                        Yii::app()->user->setFlash('error', Yii::t('app','User save failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','User saved.'));
                }
        }

        protected function do_delete($model)
        {

                if ($model->delete() === false)
                {
                        Yii::app()->user->setFlash('error', Yii::t('app','User delete failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','User deleted.'));
                        $this->redirect(array('index'));
                }
        }
}
