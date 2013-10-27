<?php

class DevicesController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$model=new Devices('search');
		$model->unsetAttributes(); // clear any default values

		if(isset($_GET['Devices']))
		{
			$model->attributes=$_GET['Devices'];

			if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
			if (!empty($model->address)) $criteria->addCondition('address = "'.$model->address.'"');
			if (!empty($model->module)) $criteria->addCondition('module = "'.$model->module.'"');
			if (!empty($model->interface)) $criteria->addCondition('interface = "'.$model->interface.'"');
		}

		$type = Yii::app()->getRequest()->getParam('type');

		if (isset($type) && !empty($type))
		{
			if($type == "sensors")
			{
				$model->switchable=0;
				$model->dimable=0;
				$criteria->addCondition('switchable IS FALSE');
				$criteria->addCondition('dimable IS FALSE');
			} elseif($type == "dimmers") {
				$model->dimable=-1;
				$criteria->addCondition('dimable IS TRUE');
			} elseif($type == "switches") {
				$model->switchable=-1;
				$criteria->addCondition('switchable IS TRUE');
			} elseif($type == "hidden") {
				$model->hide=-1;
				$criteria->addCondition('hide IS TRUE');
			} elseif($type == "disabled") {
				$model->enabled=0;
				$criteria->addCondition('enabled IS FALSE');
			}
		}

		$location = Yii::app()->getRequest()->getParam('location');

		if (isset($location) && !empty($location))
		{
			if($type != "0")
			{
				$model->location=$location;
				$criteria->addCondition('location = "'.$location.'"');
				$criteria->addCondition('dimable IS FALSE');
			}
		}

		$locations = Locations::model();
		$this->render('index', array('model'=>$model,'locations'=>$locations));
	}

	public function actionView($id)
	{
		$model = Devices::model()->findByPk($id);
		$this->render('view', array('model'=>$model));
	}

	public function actionUpdate($id)
	{
    		$model = Devices::model()->findByPk($id);
		if(isset($_POST['Devices']))
		{
			$model->attributes=$_POST['Devices'];
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
		// delete the related entries from the "devices_log" table first
		$model = DevicesLog::model()->deleteAll("deviceid ='" . $id . "'");

		// delete the entry from the "devices" table
		$model = Devices::model()->findByPk($id);
		$this->do_delete($model);
		
	}

	public function actionUpdateModule()
	{
		// update "#interface", todo "addressformat" and "devicegroup"
		if(isset($_POST['Devices']['module']))
		{
			//Yii::log("devices-module");
			$moduleid = $_POST['Devices']['module'];
			echo CHtml::DropDownList("interface", 'id', Devices::model()->getInterfacesByDeviceType($moduleid));
		}
	}

	public function actionUpdateInterface()
	{
		// update "#module"
		if(isset($_POST['Devices']['interface']))
		{
			Yii::log("devices-interface");
		}
	}

        public function actionCreate()
        {
                $model=new Devices;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Devices']))
                {
                        $model->attributes=$_POST['Devices'];
                        if($model->validate())
                        {
                                $this->do_save($model);
                        }
                }
                $this->render('create',array(
                        'model'=>$model,
                ));
        }

	public function actionSetDevice()
	{
		if(isset($_POST['Device']['id']) && isset($_POST['Device']['value']))
		{
			$current_device_id = strip_tags($_POST['Device']['id']);                   
			$current_device_value = strip_tags($_POST['Device']['value']);
			$result = $this->do_xmlrpc('device.setdevice',array($current_device_id,$current_device_value));
			echo json_encode($result);
		}
	}

	protected function do_save($model)
	{
		if ( $model->save() === false )
		{
			Yii::app()->user->setFlash('error', "Saving device... Failed!");
		} else {
			Yii::app()->user->setFlash('success', "Saving device... Successful.");
		}
	}

	protected function do_delete($model)
	{
		if ( $model->delete() === false )
		{
			Yii::app()->user->setFlash('error', "Deleting device... Failed!");
		} else {
			Yii::app()->user->setFlash('success', "Deleting device... Successful.");
		}
	}

	protected function do_xmlrpc($procedure, $data = array())
	{
		$request = xmlrpc_encode_request($procedure, $data);
		$context = stream_context_create(array('http' => array('method' => "POST",'header' =>"Content-Type: text/xml",'content' => $request)));
		$file = @file_get_contents(Yii::app()->params['xmlrpcHost'], false, $context);
		if ( $file === FALSE )
		{
			return array('error', "Couldn't connect to XML-RPC service on '" . Yii::app()->params['xmlrpcHost'] . "'");
		} else {
			if ( xmlrpc_decode($file) == "1" )
			{
				return array('success', "Control device... Successful.");
			} else {
				return array('error', "Control device... Failed!");
			}
		}
	}
}
