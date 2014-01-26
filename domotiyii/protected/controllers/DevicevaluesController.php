<?php

class DevicevaluesController extends Controller
{

	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$model=new DeviceValues('search');
		$model->unsetAttributes(); // clear any default values

		if(isset($_GET['DeviceValues']))
		{
			$model->attributes=$_GET['DeviceValues'];

			if (!empty($model->deviceid)) $criteria->addCondition('deviceid = "'.$model->deviceid.'"');

		}

		$this->render('index', array('model'=>$model));
	}

	public function actionView($id)
	{
		$model = DeviceValues::model()->findByPk($id);
		$this->render('view', array('model'=>$model));
	}

	public function actionUpdate($id)
	{
    		$model = DeviceValues::model()->findByPk($id);
		if(isset($_POST['DeviceValues']))
		{
			$model->attributes=$_POST['DeviceValues'];
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
		// delete the entry from the "DeviceValues" table
		$model = DeviceValues::model()->findByPk($id);
		$this->do_delete($model);
		
	}

        public function actionCreate()
        {
                $model=new DeviceValues;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['DeviceValues']))
                {
                        $model->attributes=$_POST['DeviceValues'];
                        if($model->validate())
                        {
                                $this->do_save($model);
				$this->redirect(array('update','id'=>$model->id));
                        }
                }
                $this->render('create',array(
                        'model'=>$model,
                ));
        }

	protected function do_save($model)
	{
		if ( $model->save() === false )
		{
			Yii::app()->user->setFlash('error', "Devicevalue save failed!");
		} else {
			Yii::app()->user->setFlash('success', "Devicevalue saved.");
		}
	}

	protected function do_delete($model)
	{
		if ( $model->delete() === false )
		{
			Yii::app()->user->setFlash('error', "Devicevalue delete failed!");
		} else {
			Yii::app()->user->setFlash('success', "Devicevalue deleted.");
                        $this->redirect(array('index'));
		}
	}

}
