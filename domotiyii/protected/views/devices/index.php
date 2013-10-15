<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Devices'),
    ),
));

if (  $this->browserdetect->isMobile() ) {
    include("index_mobile.php");
}else{
    include("index_normal.php");
}

?>
