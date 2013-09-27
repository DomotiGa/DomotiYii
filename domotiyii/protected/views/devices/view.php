<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Devices', 'url'=>array('index')),
	array('label'=>'Create Devices', 'url'=>array('create')),
	array('label'=>'Update Devices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Devices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Devices', 'url'=>array('admin')),
);
?>

<h1>View Devices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'address',
		'module',
		'location',
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
		'interface',
		'firstseen',
		'lastseen',
		'enabled',
		'hide',
		'log',
		'logdisplay',
		'logspeak',
		'groups',
		'rrd',
		'graph',
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
		'switchable',
		'dimable',
		'extcode',
		'x',
		'y',
		'floorplan',
		'lastchanged',
		'repeatstate',
		'repeatperiod',
		'reset',
		'resetperiod',
		'resetvalue',
		'poll',
	),
)); ?>
