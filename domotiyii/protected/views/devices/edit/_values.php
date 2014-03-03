<?php
/* @var $this DevicesController */
/* @var $model Devices */

$config = array();
$dataProvider = new CArrayDataProvider($rawData=$model->devicevalues, $config);

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-devicevalues-grid',
    'type'=>'striped condensed',
    'dataProvider'=>$dataProvider,
    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'valuenum', 'header'=>Yii::t('app','Valuenum'), 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'value', 'header'=>Yii::t('app','Rawvalue'), 'htmlOptions'=>array('width'=>'120')),
        array('name'=>'correction', 'header'=>Yii::t('app','Correction'), 'htmlOptions'=>array('width'=>'120')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
           'header'=>Yii::t('app','Actions'),
           'htmlOptions'=>array('style'=>'width: 40px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('app','View'),
                 'url'=>'Yii::app()->controller->createUrl("devicevalues/view", array("id"=>$data["id"]))',
              ),
              'update' => array(
                 'label'=>Yii::t('app','Edit'),
                 'url'=>'Yii::app()->controller->createUrl("devicevalues/update", array("id"=>$data["id"]))',
              ),
              'delete' => array(
                 'label'=>Yii::t('app','Delete'),
                 'url'=>'Yii::app()->controller->createUrl("devicevalues/delete", array("id"=>$data["id"],"command"=>"delete"))',
              ),
           ),
        ),
    ),
)); ?>



