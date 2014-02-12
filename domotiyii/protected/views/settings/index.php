<?php

/* @var $this SettingsIrmanController */
/* @var $model SettingsIrman */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Settings') => 'index',
        Yii::t('app', 'All'),
    ),
));

$this->widget('bootstrap.widgets.TbNav', array(
    'type'=>'tabs',
    'stacked'=>false,
    'items'=>array(
        array('label'=>Yii::t('app','All'), 'url'=>'index?filter=all', 'active'=>Yii::app()->request->getParam('filter','Enabled') == 'all'),
        array('label'=>Yii::t('app','Enabled'), 'url'=>'index?filter=Enabled', 'active'=>Yii::app()->request->getParam('filter','Enabled') == 'Enabled'),
        array('label'=>Yii::t('app','Disabled'), 'url'=>'index?filter=Disabled', 'active'=>Yii::app()->request->getParam('filter','Enabled') == 'Disabled'),
    ),
));

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'all-devices-grid',
    'type' => 'striped condensed',
    'dataProvider' => $data,
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array('name' => 'id', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '20')),
        array('name' => 'status', 'header' => Yii::t('app', 'Status'), 'htmlOptions' => array('width' => '150')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}',
            'header' => Yii::t('app', 'Action'),
            'htmlOptions' => array('style' => 'width: 40px'),
            'buttons' => array(
                'view' => array(
                    'label' => Yii::t('app', 'View'),
                    'url' => 'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
                ),
            ),
        ),
    ),
));

?>
//FIXME: [PATOCHE] why Actions title is at right, i think should be changed in css....
<script>
$(document).ready(function(){
    $('#all-devices-grid_c2').css('text-align','left');
});
</script>