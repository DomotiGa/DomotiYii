<?php
/* @var $this ConditionsController */
/* @var $model Conditions */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Conditions') => 'index',  
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
		array('name' => 'formula'),
	),
)); ?>
