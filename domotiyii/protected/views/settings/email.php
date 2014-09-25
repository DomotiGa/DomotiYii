<?php
/* @var $this SettingsEmailController */
/* @var $model SettingsEmail */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','E-mail'),
    ),
)); ?>

<legend>E-mails</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','Send test e-mail'), 'icon'=>'icon-envelope', 'url'=>Yii::app()->controller->createUrl('sendtestemail'),'active'=>false, 'linkOptions'=>array()),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-email-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'smtpserver'); ?>
		<?php echo $form->numberFieldControlGroup($model,'smtpport'); ?>
		<?php echo $form->emailFieldControlGroup($model,'fromaddress'); ?>
		<?php echo $form->emailFieldControlGroup($model,'toaddress'); ?>
		<?php echo $form->checkBoxControlGroup($model,'sslenabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'username'); ?>
		<?php echo $form->passwordFieldControlGroup($model,'password', array('help'=>Yii::t('app','Leave both fields blank for no authentication.'))); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
