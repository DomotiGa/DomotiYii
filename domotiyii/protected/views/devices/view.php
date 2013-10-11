<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Devices') => 'index',  
        Yii::t('translate','View'),
    ),
)); ?>

<legend><?php echo $model->name;?></legend>

<!-- TODO 
	rename relation collums to .._id. For example: location to location_id so you can create normal relation names instead of l_location
	Fix layout
-->
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'address',
		'l_location.name',
		'value',
		'value2',
		'value3',
		'value4',
		'label',
		'label2',
		'label3',
		'label4',
		'correction',
		'correction2',
		'correction3',
		'correction4',
		'onicon',
		'officon',
		'dimicon',
		'l_interface.name',
		'firstseen',
		'lastseen',
		'enabled:boolean',
		'hide:boolean',
		'log:boolean',
		'logdisplay:boolean',
		'logspeak:boolean',
		'groups',
		'rrd:boolean',
		'graph:boolean',
		'batterystatus',
		'tampered',
		'comments',
		'valuerrddsname',
		'value2rrddsname',
		'value3rrddsname',
		'value4rrddsname',
		'valuerrdtype',
		'value2rrdtype',
		'value3rrdtype',
		'value4rrdtype',
		'switchable:boolean',
		'dimable:boolean',
		'extcode:boolean',
		'x',
		'y',
		'l_floorplan.name',
		'lastchanged',
		'repeatstate:boolean',
		'repeatperiod',
		'reset:boolean',
		'resetperiod',
		'resetvalue',
		'poll:boolean',
	),
)); ?>


