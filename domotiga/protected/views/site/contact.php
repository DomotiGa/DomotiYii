<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        'Contact',
    ),
));
?>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>Contact Support</legend>
<p>
If you have support questions, please fill out the following form to contact us. Thank you.
</p>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->textFieldControlGroup($model,'name'); ?>
	<?php echo $form->emailFieldControlGroup($model,'email'); ?>
	<?php echo $form->textFieldControlGroup($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
	<?php echo $form->textAreaControlGroup($model,'body',array('rows'=>6, 'cols'=>50)); ?>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
)); ?>
<?php $this->endWidget(); ?>

<?php endif; ?>

