<?php

class DevicesController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$model=new Devices('search');
		$model->unsetAttributes(); // clear any default values

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
				return array('success', "Device controlled.");
			} else {
				return array('error', "Device control failed!");
			}
		}
	}
}
