<?php
/* @var $this SettingsPachubeController */
/* @var $model SettingsPachube */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','Pachube/COSM/Xively'),
    ),
)); ?>

<legend>Pachube/COSM/Xively</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','Settings'), 'icon'=>'icon-wrench', 'url'=>Yii::app()->controller->createUrl('pachube'),'active'=>true, 'linkOptions'=>array()),
                array('label'=>Yii::t('app','Devices'), 'icon'=>'icon-th-list', 'url'=>Yii::app()->controller->createUrl('devicespachube/index'), 'linkOptions'=>array()),
		array('label'=>Yii::t('app','Your Xively Feed'), 'icon'=>'icon-globe', 'url'=>'https://xively.com/feeds/'.$model->feed , 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'feed'); ?>
		<?php echo $form->textFieldControlGroup($model,'apikey', array('class'=>'span7')); ?>
		<?php echo $form->numberFieldControlGroup($model,'pushtime', array('append' => 'Minutes', 'help'=>Yii::t('app','Set to 0 to enable automatic feeds.'))); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
