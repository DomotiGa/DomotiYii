<?php
/* @var $this DevicesController */
/* @var $dataProvider CActiveDataProvider */

if (  $this->browserdetect->isMobile() ) {
    include("index_mobile.php");
}else{
    include("index_normal.php");
}

?>
