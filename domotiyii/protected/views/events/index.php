<?php
/* @var $this EventsController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Events'),
    ),
));

echo TbHtml::linkButton('Create', array(
        'rel'=>'Create event',
        'url'=>array('create'),
));

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-events-grid',
    'refreshTime'=>Yii::app()->params['refreshEvents'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->getEvents(true),
    'template'=>'{items}{pager}',
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'name', 'header'=>Yii::t('translate','Name'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'description', 'header'=>Yii::t('translate','Description'), 'htmlOptions'=>array('width'=>'100')),
        array('name'=>'trigger1', 'value'=>'$data->triggers->name', 'header'=>Yii::t('translate','Trigger'), 'htmlOptions'=>array('width'=>'100')),
        array('name'=>'lastrun', 'header'=>Yii::t('translate','Last Run'), 'htmlOptions'=>array('width'=>'100')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view}{update}{delete}',
           'header'=>Yii::t('translate','Actions'),
           'htmlOptions'=>array('style'=>'width: 40px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('translate','View event'),
                 'url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
              ),
              'update' => array(
                 'label'=>Yii::t('translate','Edit event'),
                 'url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
              ),
              'delete' => array(
                 'label'=>Yii::t('translate','Delete event'),
                 'url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
              ),
           ),
        ),
    ),
));
?>
