<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Contacts') => 'index',  
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
		array('name' => 'firstname'),
		array('name' => 'surname'),
		array('name' => 'address'),
		array('name' => 'zipcode'),
		array('name' => 'city'),
		array('name' => 'country'),
		array('name' => 'phoneno'),
		array('name' => 'mobileno'),
		array('name' => 'email'),
		array('name' => 'cidphone'),
		array('name' => 'cidmobile'),
		array('name' => 'birthday'),
		array('name' => 'holidaycard'),
		array('name' => 'comments'),
		array('name' => 'callnr'),
		array('name' => 'type'),
		array('name' => 'firstseen'),
		array('name' => 'lastseen'),
	),
)); ?>
