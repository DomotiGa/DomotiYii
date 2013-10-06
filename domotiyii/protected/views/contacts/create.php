<?php
/* @var $this ContactsController */
/* @var $model Contacts */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Contacts') => 'index',
        Yii::t('translate','Create'),
    ),
)); ?>

<legend>
Create Contact
</legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
