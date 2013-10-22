<?php
/* @var $this ConditionsController */
/* @var $model Conditions */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Conditions') => '../index',
        Yii::t('translate','Update'),
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
                array('label'=>Yii::t('translate','List'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('index'), 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','Create'), 'icon'=>'icon-plus', 'url'=>Yii::app()->controller->createUrl('create'), 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','View'), 'icon'=>'icon-eye-open', 'url'=>array('view', 'id'=>$model->id), 'linkOptions'=>array()),
                array('label'=>Yii::t('translate','Edit'), 'icon'=>'icon-edit', 'url'=>array('update', 'id'=>$model->id), 'active'=>true),
                array('label'=>Yii::t('translate','Delete'), 'icon'=>'icon-trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('translate','Are you sure you want to delete this condition?')))
        ),
));
$this->endWidget();
?>

<legend><?php echo $model->name;?></legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
