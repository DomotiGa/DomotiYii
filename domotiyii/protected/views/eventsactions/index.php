<?php
/* @var $this EventsActionsController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Actions'),
    ),
));

echo TbHtml::linkButton('Create', array(
        'rel'=>'Create action',
        'url'=>array('create'),
));

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-envetsactions-grid',
    'refreshTime'=>Yii::app()->params['refreshActions'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->getEventsActions(true),
    'template'=>'{items}{pager}',
    'columns'=>array(
        array('name'=>'event', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'action', 'header'=>Yii::t('app','Action'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'order', 'header'=>Yii::t('app','Order'), 'htmlOptions'=>array('width'=>'100')),
        array('name'=>'delay', 'header'=>Yii::t('app','Delay'), 'htmlOptions'=>array('width'=>'150')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view}{update}{delete}',
           'header'=>Yii::t('app','Actions'),
           'htmlOptions'=>array('style'=>'width: 40px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('app','View eventsaction'),
                 'url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data["event"]))',
              ),
              'update' => array(
                 'label'=>Yii::t('app','Edit eventsaction'),
                 'url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data["event"]))',
              ),
              'delete' => array(
                 'label'=>Yii::t('app','Delete eventsaction'),
                 'url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data["event"],"command"=>"delete"))',
              ),
           ),
        ),
    ),
));
?>
