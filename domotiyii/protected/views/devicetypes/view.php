<?php
/* @var $this DevicetypesController */
/* @var $model Devcietypes */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Devicetypes') => 'index',  
        Yii::t('translate','View'),
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
                array('label'=>Yii::t('translate','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','View'), 'icon'=>'icon-eye-open', 'url'=>array('view', 'id'=>$model->id), 'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','Edit'), 'icon'=>'icon-edit', 'url'=>array('update', 'id'=>$model->id)),
                array('label'=>Yii::t('translate','Delete'), 'icon'=>'icon-trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('translate','Are you sure you want to delete this devicetype?')))
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
		array('name' => 'description'),
		array('name' => 'type'),
		array('name' => 'addressformat'),
	),
)); ?>
