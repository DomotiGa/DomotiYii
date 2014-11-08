<?php

class YiiGraphsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	// $layout='//layouts/column2';

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
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new YiiGraphs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['YiiGraphs']))
		{
			$model->attributes=$_POST['YiiGraphs'];
			if($model->save())
				$this->redirect(array('index','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['YiiGraphs']))
		{
			$model->attributes=$_POST['YiiGraphs'];
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
				$this->redirect(array('index','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		// For the YiiGraphs, a database table is to be created!
		// Here we check if the table is already available if not we create the table!
		try{
			// execute query
			$list = Yii::app()->db->createCommand("SELECT count(1) FROM yii_graphs")->queryRow();
			//Table exists so do nothing!!!
		} catch(Exception $tbe) {
			////Table does not exists so create it! 
			$create_sql = "CREATE TABLE `yii_graphs` (
						  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
						  `name` varchar(45) NOT NULL,
						  `enabled` varchar(45) NOT NULL,
						  `type` varchar(45) NOT NULL,
						  `group` varchar(45) DEFAULT NULL,
						  `description` varchar(45) DEFAULT NULL,
						  `device_value_01` int(11) unsigned DEFAULT NULL,
						  `device_value_02` int(11) unsigned DEFAULT NULL,
						  `device_value_03` int(11) unsigned DEFAULT NULL,
						  `device_value_04` int(11) unsigned DEFAULT NULL,
						  `created_date` datetime DEFAULT NULL,
						  `graph_width` int(11) DEFAULT NULL,
						  `graph_height` int(11) DEFAULT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1";
			try{
				// execute query create statement
				Yii::app()->db->createCommand($create_sql)->execute();
			} catch(Exception $tbe) {
				//Something wrong....
				Yii::app()->user->setFlash('error', Yii::t('app', 'Cannot create table in DomotiGa\'s database!'));
			}
		}
		$dataProvider=new CActiveDataProvider('YiiGraphs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new YiiGraphs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['YiiGraphs']))
			$model->attributes=$_GET['YiiGraphs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return YiiGraphs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=YiiGraphs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param YiiGraphs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='yii-graphs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
}
