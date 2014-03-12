<?php

/* @var $this SettingsIrmanController */
/* @var $model SettingsIrman */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Modules') => 'indexModules',
        Yii::t('app', 'All'),
    ),
));

$this->widget('bootstrap.widgets.TbNav', array(
    'type'=>'tabs',
    'stacked'=>false,
    'items'=>array(
        array('label'=>Yii::t('app','All'), 'url'=>'indexModules?filter=all', 'active'=>Yii::app()->request->getParam('filter','Enabled') == 'all'),
        array('label'=>Yii::t('app','Enabled'), 'url'=>'indexModules?filter=Enabled', 'active'=>Yii::app()->request->getParam('filter','Enabled') == 'Enabled'),
        array('label'=>Yii::t('app','Disabled'), 'url'=>'indexModules?filter=Disabled', 'active'=>Yii::app()->request->getParam('filter','Enabled') == 'Disabled'),
    ),
));

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'all-devices-grid',
    'type' => 'striped condensed',
    'dataProvider' => $data,
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array('name' => 'id', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '15px')),
        array('name' => 'status', 'header' => Yii::t('app', 'Status'), 'htmlOptions' => array('width' => '15px')),
        array('name' => 'information', 'header' => Yii::t('app', 'Information'), 'type'=>'raw','htmlOptions' => array('width' => '200px')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update}',
            'header' => Yii::t('app', 'Action'),
            'htmlOptions' => array('style' => 'width: 10px'),
            'buttons' => array(
                'update' => array(
                    'label' => Yii::t('app', 'Update'),
                    'url' => 'Yii::app()->controller->createUrl("view", array("id"=>$data["id"]))',
                ),
            ),
        ),
    ),
));

?>
<!-- FIXME: why Actions title is at right, i think should be changed in css.... -->
<script>
$(document).ready(function(){
    $('th:last').css('text-align','left');
});
</script>