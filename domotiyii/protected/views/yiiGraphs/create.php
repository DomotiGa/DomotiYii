<?php
/* @var $this YiiGraphsController */
/* @var $model YiiGraphs */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
		Yii::t('app','Yii Graphs') => 'index',
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

<legend><?php echo Yii::t('app','Create Yii Graphs') ?></legend>
<p>
<b><?php echo Yii::t('app','Supported graph types:') ?></b><br>
<b><?php echo Yii::t('app','Barchart :') ?></b> <?php echo Yii::t('app','Displays a graph (only bars) when values of the device are logged. It shows a count of the values over time.') ?><br>
<b><?php echo Yii::t('app','Gauge :') ?></b> <?php echo Yii::t('app','Displays a gauge when values of the device are logged. It shows the last logged value.') ?> <br>
<b><?php echo Yii::t('app','Linechart :') ?></b> <?php echo Yii::t('app','Displays a line graph when values of the device are logged. It shows all logged values over time.') ?>  <br><br>
</p>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>