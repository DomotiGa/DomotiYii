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
}
