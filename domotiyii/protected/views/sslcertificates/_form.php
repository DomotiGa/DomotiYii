<?php
/* @var $this SslcertificatesController */
/* @var $model SSLCertificates */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'sslcertificates-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

		<?php echo $form->textFieldControlGroup($model,'name'); ?>
		<?php echo $form->textFieldControlGroup($model,'certificate'); ?>
		<?php echo $form->textFieldControlGroup($model,'private'); ?>
		<?php echo $form->textFieldControlGroup($model,'client'); ?>
		<?php echo $form->textFieldControlGroup($model,'description'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
