<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */


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
                array('label'=>Yii::t('translate','Disabled'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('disabled'), 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','Hidden'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('hidden'), 'linkOptions'=>array()),
        ),
));
$this->endWidget();

$this->widget('bootstrap.widgets.TbNav', array(
    'type'=>'tabs',
    'stacked'=>false,
    'items'=>array(
        array('label'=>Yii::t('translate','All'), 'url'=>'index', 'active'=>true),
        array('label'=>Yii::t('translate','Sensors'), 'url'=>'sensors'),
        array('label'=>Yii::t('translate','Dimmers'), 'url'=>'dimmers'),
        array('label'=>Yii::t('translate','Switches'), 'url'=>'switches'),
    ),
));

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-devices-grid',
    'refreshTime'=>Yii::app()->params['refreshDevices'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->getDevices('all'),
    'template'=>'{items}{pager}',
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'devicename', 'header'=>Yii::t('translate','Name'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'devicevalue', 'header'=>Yii::t('translate','Value'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'devicevalue2', 'header'=>Yii::t('translate','Value2'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'devicevalue3', 'header'=>Yii::t('translate','Value3'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'devicevalue4', 'header'=>Yii::t('translate','Value4'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'devicelocation', 'header'=>Yii::t('translate','Location'), 'htmlOptions'=>array('width'=>'120')),
        array('name'=>'devicelastseen', 'header'=>Yii::t('translate','Last Seen'), 'htmlOptions'=>array('width'=>'120')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view}{update}{delete}',
           'header'=>Yii::t('translate','Actions'),
           'htmlOptions'=>array('style'=>'width: 40px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('translate','View device'),
                 'url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
              ),
              'update' => array(
                 'label'=>Yii::t('translate','Edit device'),
                 'url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
              ),
              'delete' => array(
                 'label'=>Yii::t('translate','Delete device'),
                 'url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
              ),
           ),
        ),
    ),
)); ?>
