<?php
/* @var $this CameraViewerController */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','CameraViewer'),
    ),
));

/**
 * At the moment only Stream MJPEG cameras!
 * More cameras to be added later. 
 * Maybe add tabnav for every type of camera later.
 */

echo TbHtml::thumbnails(
$model->getCameraViewers()
);

?>
