<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Devices') => 'index',  
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
                array('label'=>Yii::t('app','Delete'), 'icon'=>'icon-trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app','Are you sure you want to delete this device?')))
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
