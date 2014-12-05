<?php

class MobileController extends Controller
{
  
  // overwrite default rules
  public function accessRules()
  {
    if (Yii::app()->params['allowMobileWithoutLogin']){      
        return array(
            array('allow',  // allow everybody
                'users'=>array('*'),
            ),
        );
    }else{
        return array(
          array('allow', // allow authenticated user 
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
  }

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
				$model_devices->location_id=$location;
				$criteria_devices->addCondition('location_id = "'.$location.'"');
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

	public function actionScene()
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
				$model_devices->location_id=$location;
				$criteria_devices->addCondition('location_id = "'.$location.'"');
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

		$this->render('scene', array('model_devices'=>$model_devices,'model_locations'=>$model_locations,'model_scenes'=>$model_scenes));
	}

	public function actionSetDevice()
	{
		if(isset($_POST['Device']['id']) && isset($_POST['Device']['value']))
		{
			$current_device_id = intval(strip_tags($_POST['Device']['id']));                   
			$current_device_value = strip_tags($_POST['Device']['value']);

			$result = doJsonRpc(array("jsonrpc"=>"2.0", "method"=>"device.set", "params" =>  array("device_id"=>$current_device_id,"value"=>$current_device_value),'id'=>1));
			giveJsonBack($result);
		}
	}

    public function actionRunScene()
	{
		if(isset($_POST['Scene']['id']))
		{
			$current_scene_id = intval(strip_tags($_POST['Scene']['id']));                   

			$result = doJsonRpc(array("jsonrpc"=>"2.0", "method"=>"scene.run", "params" =>  array("scene_id"=>$current_scene_id),'id'=>1));
			giveJsonBack($result);
		}
	}

	public function actionGetDeviceUpdate()
	{
        if(isset($_GET['location']) && is_numeric($_GET['location'])  && $_GET['location'] != 0 )
		{   
            giveJsonBack(doJsonRpc(array("jsonrpc"=>"2.0", "method"=>"device.list", "params" => array("list"=> "all",
                "locations"=>array(intval(strip_tags($_GET['location']))),
                "fields"=>array("device_id","lastseen")),'id'=>1)));
        }else{
            giveJsonBack(doJsonRpc(array("jsonrpc"=>"2.0", "method"=>"device.list", "params" => array("list"=> "all",
                "fields"=>array("device_id","lastseen")),'id'=>1)));
        }	

    }

}
