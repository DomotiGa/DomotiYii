<?php
/* @var $this SettingsRfxcomxplController */
/* @var $model SettingsRfxcomxpl */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Interfaces') => 'indexInterfaces',
        Yii::t('app','RFXCom xPL'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-rfxcomxpl-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>RFXComxPL</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'rxaddress'); ?>
		<?php echo $form->textFieldControlGroup($model,'txaddress'); ?>
		<?php echo $form->checkBoxControlGroup($model,'oldaddrfmt', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'globalx10', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
