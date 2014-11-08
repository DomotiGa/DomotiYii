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
<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, '<b>Available graph types are:</b></br><b>Barchart:</b> Displays a graph with bars, it shows a count of the values over time.</br><b>Gauge:</b> It shows the last logged values.</br><b>Linechart:</b> It shows all logged values over time.</br></br>You can only use device values which have the option \'log\' enabled, and have \'units\' defined.'); ?>
<br/>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>