<?php
/* @var $this YiiGraphsController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Yii Graphs'),
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
                array('label'=>Yii::t('app','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
        ),
));
$this->endWidget();
?>
<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_INFO, 'Please note that these graphs are only visible in DomotiYii.'); ?>
<br/>
<?php
$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-cameras-grid',
    'refreshTime'=>Yii::app()->params['refreshCameras'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$dataProvider,
    'template'=>'{items}{pager}{summary}',
    'selectableRows' => 1,
    'columns'=>array(
        array('name'=>'enabled', 
            'header'=>Yii::t('app','Enabled'),
            'value'=>'($data->enabled==-1?"<span class=\"icon-ok\"></span>":"")',
            'type' => 'raw',
            'htmlOptions'=>array('width'=>'15')),
        array('name'=>'name', 'header'=>Yii::t('app','Name'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'description', 'header'=>Yii::t('app','Description'), 'htmlOptions'=>array('width'=>'150')),
        array('name' => 'type',
            'header' => Yii::t('app', 'Type'),
            'type' => 'raw',
            'value' => '$data->getGraphType($data->type)',
            //'value' => '$data->param1',
            'htmlOptions' => array('width' => '50')),

        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
           'header'=>Yii::t('app','Actions'),
           'htmlOptions'=>array('style'=>'width: 50px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('app','View'),
                 'url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
              ),
              'update' => array(
                 'label'=>Yii::t('app','Edit'),
                 'url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
              ),
              'delete' => array(
                 'label'=>Yii::t('app','Delete'),
                 'url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
              ),
           ),
        ),
    ),
));
 
?>

