<?php
/* @var $this DevicesController */
/* @var $model Devices */

$config = array();
$dataProvider = new CArrayDataProvider($rawData=$model->actions, $config);

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-devices-grid',
    'type'=>'striped condensed',
    'dataProvider'=>$dataProvider,
    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'name', 'header'=>Yii::t('app','Name'), 'htmlOptions'=>array('width'=>'120')),
        array('name'=>'description', 'header'=>Yii::t('app','Description'), 'htmlOptions'=>array('width'=>'120')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> '{view}',
           'header'=>Yii::t('app','Action'),
           'htmlOptions'=>array('style'=>'width: 40px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('app','View'),
                 'url'=>'Yii::app()->controller->createUrl("actions/view", array("id"=>$data["id"],"event_id"=>'.$model->id.'))',
              ),
           ),
        ),
    ),
)); ?>



