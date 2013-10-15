<?php
/* @var $this ActionsController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Actions'),
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
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('translate','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'),'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','Search'), 'icon'=>'icon-search', 'url'=>'#', 'linkOptions'=>array('class'=>'search-button')),
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
    'id'=>'all-actions-grid',
    'refreshTime'=>Yii::app()->params['refreshActions'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->search(),
    'template'=>'{items}{pager}{summary}',
    'columns'=>array(
        array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('width'=>'20')),
        array('name'=>'name', 'header'=>Yii::t('translate','Name'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'description', 'header'=>Yii::t('translate','Description'), 'htmlOptions'=>array('width'=>'100')),
        array('name'=>'type', 'header'=>Yii::t('translate','Type'), 'htmlOptions'=>array('width'=>'150')),
        array('name'=>'param1', 'header'=>Yii::t('translate','Param'), 'htmlOptions'=>array('width'=>'50')),
        array('name'=>'param2', 'header'=>Yii::t('translate','Param2'), 'htmlOptions'=>array('width'=>'50')),
        array('name'=>'param3', 'header'=>Yii::t('translate','Param3'), 'htmlOptions'=>array('width'=>'50')),
        array('name'=>'param4', 'header'=>Yii::t('translate','Param4'), 'htmlOptions'=>array('width'=>'50')),
        array('name'=>'param5', 'header'=>Yii::t('translate','Param5'), 'htmlOptions'=>array('width'=>'50')),
        array('class'=>'bootstrap.widgets.TbButtonColumn',
           'template'=> Yii::app()->user->isGuest ? '{view}' : '{view} {update} {delete}',
           'header'=>Yii::t('translate','Actions'),
           'htmlOptions'=>array('style'=>'width: 115px'),
           'buttons'=>array(
              'view' => array(
                 'label'=>Yii::t('translate','View'),
                 'url'=>'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
'options'=>array(
                                                'class'=>'btn btn-small view'
                                        )
              ),
              'update' => array(
                 'label'=>Yii::t('translate','Edit'),
                 'url'=>'Yii::app()->controller->createUrl("update", array("id"=>$data["id"]))',
'options'=>array(
                                                'class'=>'btn btn-small update'
                                        )
              ),
              'delete' => array(
                 'label'=>Yii::t('translate','Delete'),
                 'url'=>'Yii::app()->controller->createUrl("delete", array("id"=>$data["id"],"command"=>"delete"))',
'options'=>array(
                                                'class'=>'btn btn-small delete'
                                        )
              ),
           ),
        ),
    ),
));
?>
