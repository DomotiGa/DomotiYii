<?php

/* @var $this LogsController */

$this->pageTitle = Yii::app()->name;

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app', 'Log Files'),
    ),
));

$this->widget('bootstrap.widgets.TbNav', array(
    'type'=>'tabs',
    'stacked'=>false,
    'items'=>array(
        array('label'=>Yii::t('app','Main (Server)'), 'url'=>'index?log=mainserver', 'active'=>Yii::app()->request->getParam('log','all') == 'mainserver'),
        array('label'=>Yii::t('app','Speak (Server)'), 'url'=>'index?log=speakserver', 'active'=>Yii::app()->request->getParam('log','all') == 'speakserver'),
        array('label'=>Yii::t('app','Debug (Server)'), 'url'=>'index?log=debugserver', 'active'=>Yii::app()->request->getParam('log','all') == 'debugserver'),
        array('label'=>Yii::t('app','Main'), 'url'=>'index?log=main', 'active'=>Yii::app()->request->getParam('log','all') == 'main'),
        array('label'=>Yii::t('app','Speak'), 'url'=>'index?log=speak', 'active'=>Yii::app()->request->getParam('log','all') == 'speak'),
        array('label'=>Yii::t('app','Debug'), 'url'=>'index?log=debug', 'active'=>Yii::app()->request->getParam('log','all') == 'debug'),
        array('label'=>Yii::t('app','DomoZwave'), 'url'=>'index?log=domozwave', 'active'=>Yii::app()->request->getParam('log','all') == 'domozwave'),
        array('label'=>Yii::t('app','Open-Zwave'), 'url'=>'index?log=openzwave', 'active'=>Yii::app()->request->getParam('log','all') == 'openzwave'),
        array('label'=>Yii::t('app','Razberry'), 'url'=>'index?log=razberry', 'active'=>Yii::app()->request->getParam('log','all') == 'razberry'),
    ),
));

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'all-logs-grid',
    'refreshTime'=>Yii::app()->params['refreshLogs'], // x second refresh as defined in config
    'type'=>'condensed',
    'dataProvider'=>$dataProvider,
    'template'=>'{pager}{items}{pager}{summary}',
    'columns' => array(
        array('name'=>'0', 'header'=>$logName),
    ),
));
?>
