<?php
/* @var $this YiiGraphsController */
/* @var $model YiiGraphs */

$this->breadcrumbs=array(
	'Yii Graphs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List YiiGraphs', 'url'=>array('index')),
	array('label'=>'Create YiiGraphs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#yii-graphs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Yii Graphs</h1>

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
	'id'=>'yii-graphs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'enabled',
		'type',
		'group',
		'description',
		/*
		'device_value_01',
		'device_value_02',
		'device_value_03',
		'device_value_04',
		'created_date',
		'graph_width',
		'graph_height',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
