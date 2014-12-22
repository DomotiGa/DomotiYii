<?php

class OpenzwavecommanderController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
    {
        $model = SettingsOpenzwave::model()->findByPk(1);
        $openzwavelist = doJsonRpc(array('jsonrpc' => '2.0', 'method' => 'tools.openzwave.get', "params" => array("command" => "list"), 'id' => 1));
        
        // renders the view file 'protected/views/openzwavecommander/index.php'
	    // using the default layout 'protected/views/layouts/main.php1
        $this->render('index', array('model' => $model, 'openzwavelist' => $openzwavelist) );               
    }

    public function actionGetController()
	{
		if(isset($_GET['instance_id']))
		{
			$instance_id = intval(strip_tags($_GET['instance_id']));                   

			$result = doJsonRpc(array("jsonrpc"=>"2.0", "method"=>"tools.openzwave.get", "params" =>  array("command" => "controller", "instance_id"=>$instance_id),'id'=>1));
			giveJsonBack($result);
		}
	}

    public function actionIncludeNode()
	{
		if(isset($_POST['instance_id']))
		{
			$instance_id = intval(strip_tags($_POST['instance_id']));                   

			$result = doJsonRpc(array("jsonrpc"=>"2.0", "method"=>"tools.openzwave.set", "params" =>  array("command" => "includedevice", "instance_id"=>$instance_id),'id'=>1));

			giveJsonBack($result);
		}
	}

    public function actionExcludeNode()
	{
		if(isset($_POST['instance_id']))
		{
			$instance_id = intval(strip_tags($_POST['instance_id']));                   

			$result = doJsonRpc(array("jsonrpc"=>"2.0", "method"=>"tools.openzwave.set", "params" =>  array("command" => "excludedevice", "instance_id"=>$instance_id),'id'=>1));

			giveJsonBack($result);
		}
	}

    public function actionCancelCommand()
	{
		if(isset($_POST['instance_id']))
		{
			$instance_id = intval(strip_tags($_POST['instance_id']));                   

			$result = doJsonRpc(array("jsonrpc"=>"2.0", "method"=>"tools.openzwave.set", "params" =>  array("command" => "cancelcontrollercommand", "instance_id"=>$instance_id),'id'=>1));

			giveJsonBack($result);
		}
	}

   public function actionHealnetwork()
	{
		if(isset($_POST['instance_id']))
		{
			$instance_id = intval(strip_tags($_POST['instance_id']));                   

			$result = doJsonRpc(array("jsonrpc"=>"2.0", "method"=>"tools.openzwave.set", "params" =>  array("command" => "healnetwork", "instance_id"=>$instance_id),'id'=>1));

			giveJsonBack($result);
		}
	}


}
