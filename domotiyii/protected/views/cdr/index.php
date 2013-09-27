<?php
/* @var $this CdrController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Phonecalls'),
    ),
)); ?>

<?php $this->widget('bootstrap.widgets.TbNav', array(
    'type'=>'tabs',
    'stacked'=>false,
    'items'=>array(
        array('label'=>Yii::t('translate','All'), 'url'=>'index', 'active'=>true),
        array('label'=>Yii::t('translate','Incoming'), 'url' => 'incoming'),
        array('label'=>Yii::t('translate','Outgoing'), 'url'=>'outgoing'),
        array('label'=>Yii::t('translate','No Answer'), 'url'=>'noanswer'),
    ),
));

$this->widget('application.extensions.LiveTbGridView.RefreshGridView', array(
    'id'=>'all-cdr-grid',
    'refreshTime'=>Yii::app()->params['refreshPhonecalls'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->search("all"),
    'template'=>'{items}{pager}',
    'columns'=>array(
		'dcontext' => array (
			'header'=>Yii::t('translate','Type'),
			'type'=>'raw',
			'name'=>'dcontext',
			'value'=>'$data->getDirection($data->dcontext)'
		),
		'name' => array (
			'header'=>Yii::t('translate','Name'),
                        'type'=>'raw',
                        'name'=>'name',
                        'value'=>'$data->getCallerName($data)'
                ),
		'src' => array (
			'header'=>Yii::t('translate','Number'),
                        'type'=>'raw',
                        'name'=>'src',
                        'value'=>'$data->getFromTo($data)'
                ),
		'channel' => array (
			'header'=>Yii::t('translate','Line'),
                        'name'=>'channel',
		),
		'calldate' => array (
			'header'=>Yii::t('translate','Time'),
                        'type'=>'raw',
                        'name'=>'calldate',
			'value'=>'$data->getTime($data->calldate)'
		),
		'billsec' => array (
			'header'=>Yii::t('translate','Duration'),
                        'type'=>'raw',
                        'name'=>'billsec',
			'value'=>'$data->getDuration($data->billsec)'
		),
		'disposition' => array (
			'header'=>Yii::t('translate','Status'),
			'type'=>'raw',
                        'name'=>'disposition',
			'value'=>'$data->getStatus($data->disposition, $data->billsec)'
		),
        ),
)); ?>
