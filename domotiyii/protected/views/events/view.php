<?php
/* @var $this EventsController */
/* @var $model Events */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Events') => 'index',  
        Yii::t('translate','View'),
    ),
)); ?>

<legend><?php echo $model->name;?></legend>

<?php $this->widget('domotiyii.DetailView', array(
	'type' => 'striped condensed',
	'data'=>$model,
        'attributes'=>array(
                array('name' => 'id'),
		array('name' => 'enabled'),
                array('name' => 'name'),
		array('name' => 'description'),
		array('name' => 'trigger1', 'value' => $model->triggers->name),
		array('name' => 'condition1'),
		array('name' => 'operand'),
		array('name' => 'condition2'),
		array('name' => 'action1'),
		array('name' => 'action2'),
		array('name' => 'action3'),
		array('name' => 'rerunenabled'),
		array('name' => 'rerunvalue'),
		array('name' => 'reruntype'),
		array('name' => 'category'),
		array('name' => 'firstrun'),
		array('name' => 'lastrun'),
		array('name' => 'log'),
		array('name' => 'comments'),
	),
)); ?>
