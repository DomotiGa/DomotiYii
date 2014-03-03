<?php

class DevicevalueslogController extends Controller
{

	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$model=new DeviceValuesLog('search');
		$model->unsetAttributes(); // clear any default values

		if(isset($_GET['DeviceValuesLog']))
		{
			$model->attributes=$_GET['DeviceValuesLog'];

			if (!empty($model->device_id)) $criteria->addCondition('device_id = "'.$model->device_id.'"');

		}

		$this->render('index', array('model'=>$model));
	}

	public function actionView($id)
	{
		$model = DeviceValuesLog::model()->findByPk($id);
		$this->render('view', array('model'=>$model));
	}

        public function actionDelete($id)
        {
                //$model = DeviceValues::model()->deleteAll("device_id ='" . $id . "'");

                // delete the entry from the "devices" table
                //$model = Devices::model()->findByPk($id);
                //$this->do_delete($model);

        }

	public function actionUpdate($id)
	{
    		$model = DeviceValuesLog::model()->findByPk($id);
		if(isset($_POST['DeviceValuesLog']))
		{
			$model->attributes=$_POST['DeviceValuesLog'];
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
                $model=new DeviceValuesLog;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['DeviceValuesLog']))
                {
                        $model->attributes=$_POST['DeviceValuesLog'];
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
			Yii::app()->user->setFlash('error', "Devicevaluelog save failed!");
		} else {
			Yii::app()->user->setFlash('success', "Devicevaluelog saved.");
		}
	}

	protected function do_delete($model)
	{
		if ( $model->delete() === false )
		{
			Yii::app()->user->setFlash('error', "Devicevaluelog delete failed!");
		} else {
			Yii::app()->user->setFlash('success', "Devicevaluelog deleted.");
                        $this->redirect(array('index'));
		}
	}

}
