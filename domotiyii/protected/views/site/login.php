<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Login'),
    ),
)); 

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'login-form',
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'focus'=>array($model,'username'),
)); ?>

<fieldset>
<legend>Login</legend>
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

		<?php echo $form->textFieldControlGroup($model,'username'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'password'); ?>
		<?php echo $form->checkBoxControlGroup($model,'rememberMe'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Login'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
