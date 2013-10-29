<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('all-devices-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Devices'),
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

<?php $this->widget('bootstrap.widgets.TbNav', array(
    'type'=>'tabs',
    'stacked'=>false,
    'items'=>array(
        array('label'=>Yii::t('app','All'), 'url'=>'index', 'active'=>Yii::app()->request->getParam('type','all') == 'all'),
        array('label'=>Yii::t('app','Sensors'), 'url'=>'index?type=sensors', 'active'=>Yii::app()->request->getParam('type','all') == 'sensors'),
        array('label'=>Yii::t('app','Dimmers'), 'url'=>'index?type=dimmers', 'active'=>Yii::app()->request->getParam('type','all') == 'dimmers'),
        array('label'=>Yii::t('app','Switches'), 'url'=>'index?type=switches', 'active'=>Yii::app()->request->getParam('type','all') == 'switches'),
        array('label'=>Yii::t('app','Hidden'), 'url'=>'index?type=hidden', 'active'=>Yii::app()->request->getParam('type','all') == 'hidden'),
        array('label'=>Yii::t('app','Disabled'), 'url'=>'index?type=disabled', 'active'=>Yii::app()->request->getParam('type','all') == 'disabled'),
    ),
));

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-devices-grid',
    'refreshTime'=>Yii::app()->params['refreshDevices'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->search(),
    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'name', 'header'=>Yii::t('app','Name'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'valuelabel', 'header'=>Yii::t('app','Value'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'valuelabel2', 'header'=>Yii::t('app','Value2'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'valuelabel3', 'header'=>Yii::t('app','Value3'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'valuelabel4', 'header'=>Yii::t('app','Value4'), 'htmlOptions'=>array('width'=>'40')),
        array('name'=>'locationtext', 'header'=>Yii::t('app','Location'), 'htmlOptions'=>array('width'=>'120')),
        array('name'=>'lastseentext', 'header'=>Yii::t('app','Last Seen'), 'htmlOptions'=>array('width'=>'120')),
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
)); ?>
