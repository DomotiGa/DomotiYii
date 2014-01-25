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

<?php

$this->widget('bootstrap.widgets.TbTabs', array(
    'id' => 'mytabs',
    'type' => 'tabs',
    'tabs' => array(
            array('id' => 'general', 'label' => Yii::t('app','Main'), 'content' => $this->renderPartial('view/_general', array('model' => $model), true), 'active' => true),
            array('id' => 'icons', 'label' => Yii::t('app','Devicevalues'), 'content' => $this->renderPartial('view/_devicevalues', array('model' => $model) , true)),

    ),
)); ?>



