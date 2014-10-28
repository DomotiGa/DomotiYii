<?php
/* @var $this DevicesxivelyController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Xively Devices'),
    ),
)); ?>

<legend>Xively Devices</legend>
<?php Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('all-devicesxively-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

$this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','Settings'), 'icon'=>'icon-wrench', 'url'=>Yii::app()->controller->createUrl('settings/xively'), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Apparaten'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
                array('label'=>Yii::t('app','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
        ),
));
$this->endWidget();
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
        'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-devicesxively-grid',
    'refreshTime'=>Yii::app()->params['refreshDevices'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->search(),
    'template'=>'{items}{pager}{summary}',
    'selectableRows'=>1,
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'datastreamid', 'header'=>'Channel/DataStreamId', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'devicename', 'header'=>Yii::t('app','Name'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'tags', 'header'=>Yii::t('app','Tags'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'value', 'header'=>Yii::t('app','Value'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'devicelabel', 'header'=>Yii::t('app','Label'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'units', 'header'=>Yii::t('app','Units'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'unittype', 'header'=>Yii::t('app','UnitType'), 'htmlOptions'=>array('width'=>'150')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
           'header'=>Yii::t('app','Actions'),
           'htmlOptions'=>array('style'=>'width: 40px'),
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
