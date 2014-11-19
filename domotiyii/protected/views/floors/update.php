<?php
/* @var $this FloorsController */
/* @var $model Floors */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Floors') => '../index',
        Yii::t('app','Update'),
    ),
));

$this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','View'), 'icon'=>'icon-eye-open', 'url'=>array('view', 'id'=>$model->floor), 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Edit'), 'icon'=>'icon-edit', 'url'=>array('update', 'id'=>$model->floor), 'active'=>true),
                array('label'=>Yii::t('app','Delete'), 'icon'=>'icon-trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->floor),'confirm'=>Yii::t('app','Are you sure you want to delete this floor?')))
        ),
));
$this->endWidget();
?>

<legend><?php echo $model->name;?></legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
