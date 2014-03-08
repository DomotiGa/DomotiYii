<?php
/* @var $this ActionsController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Actions'),
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').slideToggle('fast');
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('all-actions-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

$this->beginWidget('zii.widgets.CPortlet', array(
    'htmlOptions' => array(
        'class' => ''
    )
));
$this->widget('bootstrap.widgets.TbNav', array(
    'type' => TbHtml::NAV_TYPE_PILLS,
    'items' => array(
        array('label' => Yii::t('app', 'List'), 'icon' => 'icon-th-list', 'url' => Yii::app()->controller->createUrl('index'), 'active' => true, 'linkOptions' => array()),
        array('label' => Yii::t('app', 'Search'), 'icon' => 'icon-search', 'url' => '#', 'linkOptions' => array('class' => 'search-button')),
        array('label' => Yii::t('app', 'Create'), 'icon' => 'icon-plus', 'url' => Yii::app()->controller->createUrl('create'), 'linkOptions' => array()),
    ),
    'htmlOptions' => array('class' => 'center'),
));
$this->endWidget();
?>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('domotiyii.LiveGridView', array(
    'id' => 'all-actions-grid',
    'refreshTime' => Yii::app()->params['refreshActions'], // x second refresh as defined in config
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'template' => '{items}{pager}{summary}',
    'selectableRows' => 1,
    'columns' => array(
        array('name' => 'id', 'header' => '#', 'htmlOptions' => array('width' => '20')),
        array('name' => 'name', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '150')),
        array('name' => 'action',
            'header' => Yii::t('app', 'Type'),
            'type' => 'raw',
            'value' => '$data->getActionText($data->type)',
            'htmlOptions' => array('width' => '150'),
        ),
        array('name' => 'param1',
            'header' => Yii::t('app', 'Param1'),
            'type' => 'raw',
            //'value' => '($data->type==1?$data->param1." - ".Devices::getDeviceName($data->param1):$data->param1)',
            'value' => '$data->param1',
            'htmlOptions' => array('width' => '50')),
        array('name' => 'param2', 'header' => Yii::t('app', 'Param2'), 'htmlOptions' => array('width' => '50')),
        array('name' => 'param3', 'header' => Yii::t('app', 'Param3'), 'htmlOptions' => array('width' => '50')),
        array('name' => 'param4', 'header' => Yii::t('app', 'Param4'), 'htmlOptions' => array('width' => '50')),
        array('name' => 'param5', 'header' => Yii::t('app', 'Param5'), 'htmlOptions' => array('width' => '50')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
            'header' => Yii::t('app', 'Actions'),
            'htmlOptions' => array('style' => 'width: 115px'),
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('app', 'View'),
                    'url' => 'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
                ),
                'update' => array(
                    'label' => Yii::t('app', 'Edit'),
                    'url' => 'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
                ),
                'delete' => array(
                    'label' => Yii::t('app', 'Delete'),
                    'url' => 'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
                ),
            ),
        ),
    ),
));
?>
