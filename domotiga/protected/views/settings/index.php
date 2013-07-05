<?php 

/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
        'Error',
);
?>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=> CHtml::encode(Yii::app()->name),
    'brandUrl'=> array('/site/indx'),
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
),

)); ?>

