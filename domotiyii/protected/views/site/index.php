<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Home'),
    ),
));

$this->widget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'DomotiGa',
    'content' => yii::t('app','This is a new web client build from scratch using the Yii framework together with the Yiistrap extension to add the bootstrap look and feel.')
)); ?>
