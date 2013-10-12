<?php
/* @var $this TriggersController */
/* @var $model Triggers */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Triggers') => 'index',  
        Yii::t('translate','View'),
    ),
)); ?>

<legend><?php echo $model->name;?></legend>

<?php $this->widget('domotiyii.DetailView', array(
	'type' => 'striped condensed',
	'data'=>$model,
        'attributes'=>array(
                array('name' => 'id'),
                array('name' => 'name'),
		array('name' => 'description'),
		array('name' => 'type'),
		array('name' => 'param1'),
		array('name' => 'param2'),
		array('name' => 'param3'),
		array('name' => 'param4'),
		array('name' => 'param5'),
	),
)); ?>
