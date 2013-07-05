<?php
/* @var $this SettingsXmlrpcController */
/* @var $model SettingsXmlrpc */
/* @var $form bootstrap.widgets.TbActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-xmlrpc-xmlrpc-form',
	'type'=>'horizontal',
)); ?>

<fieldset>
<legend>XML-RPC Settings</legend>
		<?php echo $form->errorSummary($model); ?>

		<?php echo $form->checkBoxRow($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>

		<?php echo $form->textFieldRow($model,'httpport'); ?>
		<?php echo $form->error($model,'httpport'); ?>

		<?php echo $form->textFieldRow($model,'maxconn'); ?>
		<?php echo $form->error($model,'maxconn'); ?>

		<?php echo $form->checkBoxRow($model,'broadcastudp'); ?>
		<?php echo $form->error($model,'broadcastudp'); ?>

		<?php echo $form->textFieldRow($model,'udpport'); ?>
		<?php echo $form->error($model,'udpport'); ?>

		<?php echo $form->checkBoxRow($model,'debug'); ?>
		<?php echo $form->error($model,'debug'); ?>

</fieldset>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>

<?php $this->endWidget(); ?>
