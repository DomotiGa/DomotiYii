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
        <!-- Devices will be added here -->
    </tbody>
</table>

<div id="device" style="display: none;">
    <h2 class="title">Device()</h2>
    <h4>Info</h4>
    <table class="info detail-view table table-striped table-condensed">
        <tbody>
            <tr class="id"><th>Node ID</th><td>Loading...</td></tr>
            <tr class="lastseen"><th>Lastseen</th><td>Loading...</td></tr>
            <tr class="neighbors"><th>Neighbors</th><td>Loading...</td></tr>
        </tbody>
    </table>

    <h4>Control</h4>
    <button type="button" class="btn btn-default" id="basicreport">
        Basic report
    </button>

    <h4>Groups</h4>
    <table class="groups detail-view table table-striped table-condensed">
        <tbody>
        </tbody>
    </table>


    <h4>Config</h4>
    <table class="config detail-view table table-striped table-condensed">
        <tbody>
        </tbody>
    </table>
  </div>
</div>


<h2>Controller</h2>
<div>
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
</div>

<h2>Statics</h2>
<div>
    <button type="button" class="btn btn-default" id="heartbeat" disabled="disabled">
        Heartbeat <span class="badge">0</span>
    </button>
    <button type="button" class="btn btn-default" id="status" disabled="disabled">
        Status <span class="badge"> </span>
    </button>
    <button type="button" class="btn btn-default" id="sendPackets" disabled="disabled">
        Send packets <span class="badge">0</span>
    </button>
    <button type="button" class="btn btn-default" id="recivedPackets" disabled="disabled">
        Recived packets <span class="badge">0</span>
    </button>
</div>
