<?php
/* @var $this DevicesxivelyController */
/* @var $model DevicesXively */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Xively Devices') => 'index',
        Yii::t('app','Create'),
    ),
)); ?>

<legend>Xively Devices</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'),'active'=>true, 'linkOptions'=>array()),
        ),
));
$this->endWidget();
?>

<legend><?php echo Yii::t('app','Create Xively Device') ?></legend>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
