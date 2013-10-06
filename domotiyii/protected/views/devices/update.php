<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Devices') => '../index',
        Yii::t('translate','Update'),
    ),
));

echo $this->renderPartial('_form', array('model'=>$model)); ?>
