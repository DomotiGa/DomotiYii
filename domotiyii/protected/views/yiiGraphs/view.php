<?php
/* @var $this YiiGraphsController */
/* @var $model YiiGraphs */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Yii Graph') => 'index',  
        Yii::t('app','View'),
    ),
));

$this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','View'), 'icon'=>'icon-eye-open', 'url'=>array('view', 'id'=>$model->id), 'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Edit'), 'icon'=>'icon-edit', 'url'=>array('update', 'id'=>$model->id)),
                array('label'=>Yii::t('app','Delete'), 'icon'=>'icon-trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app','Are you sure you want to delete this graph?')))
        ),
));
$this->endWidget();
?>
<legend><?php echo $model->name;?></legend>

<?php $this->widget('domotiyii.DetailView', array(
	'type' => 'striped condensed',
	'data'=>$model,
	'attributes'=>array(
		array('name' => 'id'),
		array('name' => 'name'),
		array('name' => 'enabled', 'type' =>'boolean'),
		array('name' => 'type'),
		array('name' => 'group'),
		array('name' => 'description'),
		array('name' => 'device_value_01'),
		array('name' => 'device_value_02'),
		array('name' => 'device_value_03'),
		array('name' => 'device_value_04'),
		array('name' => 'created_date'),
		array('name' => 'graph_width'),
		array('name' => 'graph_height'),
	),
)); ?>
