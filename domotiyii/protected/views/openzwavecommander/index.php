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
	exit();
}

// 


?>
