<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Devices') => 'index',  
        Yii::t('translate','View'),
    ),
)); ?>

$this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('translate','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
        ),
));
$this->endWidget();

<legend><?php echo $model->name;?></legend>

<?php $this->widget('domotiyii.DetailView', array(
	'type' => 'striped condensed',
	'data'=>$model,
        'attributes'=>array(
                array('name' => 'id'),
                array('name' => 'name'),
		array('name' => 'address'),
		array('name' => 'module'),
		array('name' => 'location'),
		array('name' => 'value'),
		array('name' => 'value2'),
		array('name' => 'value3'),
		array('name' => 'value4'),
		array('name' => 'label'),
		array('name' => 'label2'),
		array('name' => 'label3'),
		array('name' => 'label4'),
		array('name' => 'correction'),
		array('name' => 'correction2'),
		array('name' => 'correction3'),
		array('name' => 'correction4'),
		array('name' => 'onicon'),
		array('name' => 'officon'),
		array('name' => 'dimicon'),
		array('name' => 'interface'),
		array('name' => 'firstseen'),
		array('name' => 'lastseen'),
		array('name' => 'enabled'),
		array('name' => 'hide'),
		array('name' => 'log'),
		array('name' => 'logdisplay'),
		array('name' => 'logspeak'),
		array('name' => 'groups'),
		array('name' => 'rrd'),
		array('name' => 'graph'),
		array('name' => 'batterystatus'),
		array('name' => 'tampered'),
		array('name' => 'comments'),
		array('name' => 'valuerrddsname'),
		array('name' => 'value2rrddsname'),
		array('name' => 'value3rrddsname'),
		array('name' => 'value4rrddsname'),
		array('name' => 'valuerrdtype'),
		array('name' => 'value2rrdtype'),
		array('name' => 'value3rrdtype'),
		array('name' => 'value4rrdtype'),
		array('name' => 'switchable'),
		array('name' => 'dimable'),
		array('name' => 'extcode'),
		array('name' => 'x'),
		array('name' => 'y'),
		array('name' => 'floorplan'),
		array('name' => 'lastchanged'),
		array('name' => 'repeatstate'),
		array('name' => 'repeatperiod'),
		array('name' => 'reset'),
		array('name' => 'resetperiod'),
		array('name' => 'resetvalue'),
		array('name' => 'poll'),
	),
)); ?>
