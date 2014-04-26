<?php
/* @var $this DevicesController */
/* @var $model Devices */

$dp=new CActiveDataProvider('EventsActions', array(
'criteria'=>array(
'condition'=>'t.event='.$model->id,
'order'=>'t.order')));

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-devices-grid',
    'type'=>'striped condensed',
    'dataProvider'=>$dp,
    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        array('name'=>'action', 
            'header'=>'#', 
            'htmlOptions'=>array('width'=>'20')),
        array('name'=>'name', 
            'header'=>Yii::t('app','Name'),
            'value'=>'$data->l_action->name',
            'htmlOptions'=>array('width'=>'120')),
        array('name'=>'description', 
            'header'=>Yii::t('app','Description'), 
            'value'=>'$data->l_action->description',
            'htmlOptions'=>array('width'=>'120')),
        array('name'=>'order', 
            'header'=>Yii::t('app','Order'), 
            'htmlOptions'=>array('width'=>'120')),
        array('name'=>'delay', 
            'header'=>Yii::t('app','Delay'), 
            'htmlOptions'=>array('width'=>'120')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> '{view}',
           'header'=>Yii::t('app','Action'),
           'htmlOptions'=>array('style'=>'width: 40px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('app','View'),
                 'url'=>'Yii::app()->controller->createUrl("actions/view", array("id"=>$data["action"],"event_id"=>'.$model->id.'))',
              ),
           ),
        ),
    ),
)); ?>



