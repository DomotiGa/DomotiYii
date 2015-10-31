<?php
/* @var $this SettingsVisonicController */
/* @var $model SettingsVisonic */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Plugins') => 'indexPlugins',
        Yii::t('app','Visonic'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-visonic-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>Visonic Security Panel</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'serialport', array('class'=>'span5')); ?>
		<?php echo $form->passwordFieldControlGroup($model,'mastercode'); ?>
		<?php echo $form->checkBoxControlGroup($model,'autosynctime', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'forcestandardmode', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'motiontimeout', array('append' => 'Seconds')); ?>
		<?php echo $form->numberFieldControlGroup($model,'sensorarmstatus'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
