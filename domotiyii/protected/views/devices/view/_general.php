<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->widget('domotiyii.DetailView', array(
	'type' => 'striped condensed',
	'data'=>$model,
        'attributes'=>array(
                array('name' => 'id'),
                array('name' => 'name'),
		array('name' => 'address'),
		array('name' => 'devicetype.name'),
        // TODO rename _
		array('name' => 'l_location.name'),
		array('name' => 'onicon'),
		array('name' => 'officon'),
		array('name' => 'dimicon'),
        // TODO rename _
		array('name' => 'l_interface.name'),
		array('name' => 'firstseen'),
		array('name' => 'lastseen'),
		array('name' => 'enabled', 'type' =>'boolean'),
		array('name' => 'hide', 'type' =>'boolean'),
		array('name' => 'groups'),
		array('name' => 'batterystatus'),
		array('name' => 'tampered'),
		array('name' => 'comments'),
		array('name' => 'switchable', 'type' =>'boolean'),
		array('name' => 'dimable', 'type' =>'boolean'),
		array('name' => 'extcode', 'type' =>'boolean'),
		array('name' => 'x'),
		array('name' => 'y'),
		array('name' => 'floorplan'),
		array('name' => 'lastchanged'),
		array('name' => 'repeatstate', 'type' =>'boolean'),
		array('name' => 'repeatperiod'),
		array('name' => 'reset', 'type' =>'boolean'),
		array('name' => 'resetperiod'),
		array('name' => 'resetvalue'),
		array('name' => 'poll'),
	),
)); ?>



