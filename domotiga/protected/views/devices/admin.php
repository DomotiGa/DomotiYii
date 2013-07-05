<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Devices', 'url'=>array('index')),
	array('label'=>'Create Devices', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#devices-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Devices</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'devices-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'address',
		'module',
		'location',
		'value',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
