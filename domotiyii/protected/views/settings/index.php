<?php

/* @var $this SettingsIrmanController */
/* @var $model SettingsIrman */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Interfaces') => 'index',
        Yii::t('app', 'Modules'),
    ),
));

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'all-devices-grid',
    'type' => 'striped condensed',
    'dataProvider' => $data,
    'template' => '{items}{pager}{summary}',
    'columns' => array(
        array('name' => 'id', 'header' => Yii::t('app', 'Name'), 'htmlOptions' => array('width' => '20')),
        array('name' => 'comment', 'header' => Yii::t('app', 'State'), 'htmlOptions' => array('width' => '150')),
        array('class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}',
            'header' => Yii::t('app', 'Actions'),
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

