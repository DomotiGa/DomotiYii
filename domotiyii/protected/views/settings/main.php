<?php
/* @var $this SettingsMainController */
/* @var $model SettingsMain */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => '../index',
        Yii::t('app','Main'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-main-main-form',
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>

		<?php echo $form->numberFieldControlGroup($model,'sleeptime', array('append' => 'mS')); ?>
		<?php echo $form->numberFieldControlGroup($model,'flushtime', array('append' => 'mS')); ?>
		<?php echo $form->numberFieldControlGroup($model,'logbuffer', array('append' => 'Chars')); ?>
		<?php echo $form->checkBoxControlGroup($model,'authentication', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debugevents', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debugdevices', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debugenergy', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'autodevicecreate', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'startpage'); ?>
		<?php echo $form->textFieldControlGroup($model,'logprefix'); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
