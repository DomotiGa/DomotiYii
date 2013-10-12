<?php
/* @var $this TriggersController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Triggers'),
    ),
));

echo TbHtml::linkButton('Create', array(
        'rel'=>'Create trigger',
        'url'=>array('create'),
));

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-triggers-grid',
    'refreshTime'=>Yii::app()->params['refreshTriggers'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->getTriggers(true),
    'template'=>'{items}{pager}',
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'name', 'header'=>Yii::t('translate','Name'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'description', 'header'=>Yii::t('translate','Description'), 'htmlOptions'=>array('width'=>'100')),
        array('name'=>'type', 'header'=>Yii::t('translate','Type'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'param1', 'header'=>Yii::t('translate','Param 1'), 'htmlOptions'=>array('width'=>'50')),
        array('name'=>'param2', 'header'=>Yii::t('translate','Param 2'), 'htmlOptions'=>array('width'=>'50')),
        array('name'=>'param3', 'header'=>Yii::t('translate','Param 3'), 'htmlOptions'=>array('width'=>'50')),
        array('name'=>'param4', 'header'=>Yii::t('translate','Param 4'), 'htmlOptions'=>array('width'=>'50')),
        array('name'=>'param5', 'header'=>Yii::t('translate','Param 5'), 'htmlOptions'=>array('width'=>'50')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view}{update}{delete}',
           'header'=>Yii::t('translate','Actions'),
           'htmlOptions'=>array('style'=>'width: 40px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('translate','View trigger'),
                 'url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
              ),
              'update' => array(
                 'label'=>Yii::t('translate','Edit trigger'),
                 'url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
              ),
              'delete' => array(
                 'label'=>Yii::t('translate','Delete trigger'),
                 'url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
              ),
           ),
        ),
    ),
));
?>
