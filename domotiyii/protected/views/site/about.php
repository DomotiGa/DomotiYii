<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','About'),
    ),
)); ?>

<legend>About DomotiGa</legend>
DomotiGa is Open Source Home Automation Software for Linux.
It's designed to control all sorts of devices, and receive input from various sensors.</br></br>

<legend>About this WebGUI</legend>
Running with:</br>
PHP <?php echo phpversion(); ?></br>
Yii framework <?php echo Yii::getVersion(); ?></br>
Yiistrap 1.2.0</br>
