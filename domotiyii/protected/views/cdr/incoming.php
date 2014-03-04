<?php
/* @var $this CdrController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Phonecalls'),
    ),
)); ?>

<?php $this->widget('bootstrap.widgets.TbNav', array(
    'type'=>'tabs',
    'stacked'=>false,
    'items'=>array(
        array('label'=>Yii::t('app','All'), 'url'=>'index'),
        array('label'=>Yii::t('app','Incoming'), 'url' => 'incoming', 'active'=>true),
        array('label'=>Yii::t('app','Outgoing'), 'url'=>'outgoing'),
        array('label'=>Yii::t('app','No Answer'), 'url'=>'noanswer'),
    ),
));

$this->widget('domotiyii.LiveGridView', array(
    'id'=>'incoming-cdr-grid',
    'refreshTime'=>Yii::app()->params['refreshPhonecalls'], // x second refresh as defined in config
    'type'=>'striped condensed',
    'dataProvider'=>$model->search("incoming"),
    'template'=>'{items}{pager}',
    'columns'=>array(
		'dcontext' => array (
			'header'=>Yii::t('app','Type'),
			'type'=>'raw',
			'name'=>'dcontext',
			'value'=>'$data->getDirection($data->dcontext)'
		),
		'name' => array (
			'header'=>Yii::t('app','Name'),
                        'type'=>'raw',
                        'name'=>'name',
                        'value'=>'$data->getCallerName($data)'
                ),
		'src' => array (
			'header'=>Yii::t('app','Number'),
                        'type'=>'raw',
                        'name'=>'src',
                        'value'=>'$data->getFromTo($data)'
                ),
		'channel' => array (
			'header'=>Yii::t('app','Line'),
                        'name'=>'channel',
		),
		'calldate' => array (
			'header'=>Yii::t('app','Time'),
			'type'=>'raw',
			'name'=>'calldate',
			'value'=>'$data->getTime($data->calldate)'
		),
		'billsec' => array (
			'header'=>Yii::t('app','Duration'),
                        'type'=>'raw',
                        'name'=>'billsec',
			'value'=>'$data->getDuration($data->billsec)'
		),
		'disposition' => array (
			'header'=>Yii::t('app','Status'),
			'type'=>'raw',
                        'name'=>'disposition',
			'value'=>'$data->getStatus($data->disposition, $data->billsec)'
		),
        ),
)); ?>
