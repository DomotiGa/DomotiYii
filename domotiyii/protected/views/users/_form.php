<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'users-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

		<?php echo $form->textFieldControlGroup($model,'username'); ?>
		<?php echo $form->textFieldControlGroup($model,'fullname'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'password'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'repeat_password'); ?>
		<?php echo $form->textFieldControlGroup($model,'emailaddress'); ?>
		<?php echo $form->checkBoxControlGroup($model,'admin',array('value'=>1)); ?>
		<?php echo $form->textFieldControlGroup($model,'lastlogin'); ?>
		<?php echo $form->textFieldControlGroup($model,'comments'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
