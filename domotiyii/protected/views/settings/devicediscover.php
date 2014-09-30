<?php
/* @var $this SettingsDevicediscoverController */
/* @var $model SettingsDevicediscover */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Plugins') => 'indexPlugins',
        Yii::t('app','Device Discover'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-devicediscover-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>Device Discover</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'multicasthost'); ?>
		<?php echo $form->numberFieldControlGroup($model,'multicastport'); ?>
		<?php echo $form->checkBoxControlGroup($model,'listenonly', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'broadcastinterval', array('append' => 'Minutes')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
