<?php
/* @var $this SettingsVisonicController */
/* @var $model SettingsVisonic */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Interfaces') => '../index',
        Yii::t('translate','Visonic'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-visonic-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'serialport', array('class'=>'span5')); ?>
		<?php echo $form->passwordFieldControlGroup($model,'mastercode'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('translate','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('translate','Reset')),
)); ?>
<?php $this->endWidget(); ?>
