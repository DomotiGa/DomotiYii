<?php
/* @var $this SettingsAstroController */
/* @var $model SettingsAstro */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Settings') => '../index',
        Yii::t('translate','Astro and Location'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>

		<?php echo $form->textFieldControlGroup($model,'timezone'); ?>
		<?php echo $form->checkBoxControlGroup($model,'dst', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'latitude'); ?>
		<?php echo $form->textFieldControlGroup($model,'longitude'); ?>
		<?php echo $form->dropDownListControlGroup($model,'twilight', array('nautical' => 'nautical', 'civil' => 'civil', 'astronomical' => 'astronomical')); ?>
		<?php echo $form->textFieldControlGroup($model,'seasons'); ?>
		<?php echo $form->textFieldControlGroup($model,'seasonstarts'); ?>
		<?php echo $form->dropDownListControlGroup($model,'temperature', array('°C' => '°C', '°F' => '°F')); ?>
		<?php echo $form->dropDownListControlGroup($model,'currency', array('€' => '€', '$' => '$')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('translate','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('translate','Reset')),
)); ?>
<?php $this->endWidget(); ?>
