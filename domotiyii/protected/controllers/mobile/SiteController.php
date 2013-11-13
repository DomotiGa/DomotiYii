<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
        $this->pageTitle = 'DomotiGa - Mobile';
		
		$type = Yii::app()->getRequest()->getParam('type');
		$location = Yii::app()->getRequest()->getParam('location');


        $criteria_devices = new CDbCriteria();
		$model_devices=new Devices('search');
		$model_devices->unsetAttributes(); // clear any default values


	    $model_devices->enabled=-1;
	    $criteria_devices->addCondition('enabled IS TRUE');

		if (isset($type) && !empty($type))
		{
			if($type == "sensors")
			{
				$model_devices->switchable=0;
				$model_devices->dimable=0;
				$criteria_devices->addCondition('switchable IS FALSE');
				$criteria_devices->addCondition('dimable IS FALSE');
			} elseif($type == "dimmers") {
				$model_devices->dimable=-1;
				$criteria_devices->addCondition('dimable IS TRUE');
			} elseif($type == "switches") {
				$model_devices->switchable=-1;
				$criteria_devices->addCondition('switchable IS TRUE');
			}
		}

		if (isset($location) && !empty($location))
		{
			if($location != "0")
			{
				$model_devices->location=$location;
				$criteria_devices->addCondition('location = "'.$location.'"');
			}
		}

        $criteria_scenes = new CDbCriteria();
		$model_scenes=new Scenes('search');
		$model_scenes->unsetAttributes(); // clear any default values

	    $model_scenes->enabled=-1;
	    $criteria_scenes->addCondition('enabled IS TRUE');

		if (isset($location) && !empty($location))
		{
			if($location != "0")
			{
				$model_scenes->location_id=$location;
				$criteria_scenes->addCondition('location_id = "'.$location.'"');
			}
		}

		$model_locations = Locations::model();

		$this->render('index', array('model_devices'=>$model_devices,'model_locations'=>$model_locations,'model_scenes'=>$model_scenes));
	}


	public function actionSetDevice()
	{
		if(isset($_POST['Device']['id']) && isset($_POST['Device']['value']))
		{
			$current_device_id = intval(strip_tags($_POST['Device']['id']));                   
			$current_device_value = strip_tags($_POST['Device']['value']);

			$result = $this->do_jsonrpc(array("jsonrpc"=>"2.0", "method"=>"device.set", "params" =>  array("deviceid"=>$current_device_id,"value"=>$current_device_value),'id'=>1));
			echo json_encode($result);
		}
	}

	public function actionGetDeviceUpdate()
	{
        $result = $this->do_jsonrpc(array("jsonrpc"=>"2.0", "method"=>"device.list", "params" => array("list"=> "all","fields"=>array("device_id","value1","label1","value2","label2","value3","label3","value4","label4","lastseen")),'id'=>1));
		echo json_encode($result);
	}

	protected function do_jsonrpc($data = array())
	{
		$request = json_encode($data);
		$context = stream_context_create(
            array('http' => 
                array('method' => "POST",
                        'header' =>"Content-Type: application/json\r\n" .
                                 "Accept: application/json\r\n",
                        'content' => $request)));
		$file = @file_get_contents(Yii::app()->params['jsonrpcHost'], false, $context);
        
        if ( $file === FALSE )
		{		
            // could not connect
            return array("jsonrpc"=>"2.0","result"=>false,"id"=>1);
		} else {
            return json_decode($file);
		}
	}
}
