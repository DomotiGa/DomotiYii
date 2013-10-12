<?php
/* @var $this EventsController */
/* @var $model Events */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Events') => '../index',
        Yii::t('translate','Update'),
    ),
));

echo $this->renderPartial('_form', array('model'=>$model)); ?>
