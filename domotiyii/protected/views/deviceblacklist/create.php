<?php
/* @var $this DeviceblacklistController */
/* @var $model Deviceblacklist */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Device Blacklist') => 'index',
        Yii::t('app','Create'),
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
                array('label'=>Yii::t('app','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'),'active'=>true, 'linkOptions'=>array()),
        ),
));
$this->endWidget();
?>

<legend><?php echo Yii::t('app','Create Device Blacklist') ?></legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
