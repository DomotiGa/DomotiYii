<?php
/* @var $this SettingsVideoserverController */
/* @var $model SettingsVideoserver */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Interfaces') => 'indexInterfaces',
        Yii::t('app','IP9100 Video'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-videoserver-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>VideoServer IP9100</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'tcphost'); ?>
		<?php echo $form->numberFieldControlGroup($model,'tcpport'); ?>
		<?php echo $form->textFieldControlGroup($model,'user'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'password'); ?>
		<?php echo $form->textFieldControlGroup($model,'channel1'); ?>
		<?php echo $form->textFieldControlGroup($model,'channel2'); ?>
		<?php echo $form->textFieldControlGroup($model,'channel3'); ?>
		<?php echo $form->textFieldControlGroup($model,'channel4'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
