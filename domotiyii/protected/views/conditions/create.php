<?php
/* @var $this ConditionsController */
/* @var $model Conditions */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Conditions') => 'index',
        Yii::t('translate','Create'),
    ),
)); ?>

<legend>
Create Condition
</legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
