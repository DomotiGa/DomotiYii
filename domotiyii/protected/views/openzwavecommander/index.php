<?php

/* @var $this OpenzwavecommanderController */

$this->pageTitle = Yii::app()->name;

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Open Zwave Commander'),
    ),
));

// Exit if no open zwave instance is found
if(!$model->enabled || !$openzwavelist || !$openzwavelist->result || $openzwavelist->result->count <= 0){
	echo 'Open Zwave is not enabled, please enable and configure Open Zwave.';
}else{
    // set the javascript 
    $baseUrl = Yii::app()->baseUrl; 
    $cs = Yii::app()->getClientScript();

    $cs->registerScript("openzwavelist", 'openzwavelist = jQuery.parseJSON("'.addslashes(CJSON::encode($openzwavelist->result)).'"); start_openzwave();');
    $cs->registerScriptFile($baseUrl.'/static/domotiga_openzwavecommander.js');
}

?>
<h1>Open Zwave Commander</h1>

<h2>Devices</h2>
<table class="table table-striped devices">
    <thead>
        <tr>
            <th>#</th>
            <th>Specific Type</th>
            <th>State</th>
            <th>Manufacturer</th>
            <th>Model</th>
            <th>Lastseen</th>
        </tr>
    </thead>
    <tbody>

    
    </tbody>
</table>

<h2>Controller</h2>
<button type="button" class="btn btn-default" id="includenode">
    Include Node
</button>
<button type="button" class="btn btn-default" id="excludenode">
    Exclude Node
</button>
<button type="button" class="btn btn-default" id="cancelcommand">
    Cancel Command
</button>
<button type="button" class="btn btn-default" id="healcommand">
    Heal Command
</button>

<h2>Statics</h2>
<div>
    <button type="button" class="btn btn-default" id="heartbeat">
        Heartbeat <span class="badge">0</span>
    </button>
    <button type="button" class="btn btn-default" id="status">
        Status <span class="badge"> </span>
    </button>
    <button type="button" class="btn btn-default" id="sendPackets">
        Send packets <span class="badge">0</span>
    </button>
    <button type="button" class="btn btn-default" id="recivedPackets">
        Recived packets <span class="badge">0</span>
    </button>
</div>
