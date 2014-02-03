<?php
/* @var $this EventsController */
/* @var $model Event */
     $this->widget('domotiyii.DetailView', array(
	'type' => 'striped condensed',
	'data'=>$model,
        'attributes'=>array(
                array('name' => 'id'),
		array('name' => 'enabled', 'type' =>'boolean'),
                array('name' => 'name'),
		array('name' => 'description'),
		array('name' => 'triggername'),
		array('name' => 'conditionname1'),
		array('name' => 'operand'),
		array('name' => 'conditionname2'),
		array('name' => 'rerunenabled', 'type' =>'boolean'),
		array('name' => 'rerunvalue'),
		array('name' => 'reruntype'),
		array('name' => 'categoryname'),
		array('name' => 'firstrun'),
		array('name' => 'lastrun'),
		array('name' => 'log', 'type' =>'boolean'),
		array('name' => 'comments'),
	),
)); ?>
