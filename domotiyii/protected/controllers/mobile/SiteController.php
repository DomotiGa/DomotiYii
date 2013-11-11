<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
        $this->pageTitle = 'DomotiGa - Mobile';
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
			$current_device_id = intval(strip_tags($_POST['Device']['id']));                   
			$current_device_value = strip_tags($_POST['Device']['value']);

			$result = $this->do_jsonrpc(array("jsonrpc"=>"2.0", "method"=>"device.set", "params" =>  array("deviceid"=>$current_device_id,"value"=>$current_device_value),'id'=>1));
			echo json_encode($result);
		}
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
