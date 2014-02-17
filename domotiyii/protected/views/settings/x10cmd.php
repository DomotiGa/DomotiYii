<?php
/* @var $this SettingsX10cmdController */
/* @var $model SettingsX10cmd */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Interfaces') => 'indexInterfaces',
        Yii::t('app','X10cmd'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-x10cmd-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>X10 Cmd</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->dropDownListControlGroup($model,'type', array('0' => 'CM11A (heyu)', '1' => 'CM15A (cm15ademo)', '2' => 'CM17A (heyu)')); ?> 
		<?php echo $form->textFieldControlGroup($model,'command'); ?>
		<?php echo $form->checkBoxControlGroup($model,'monitor', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'globalx10', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
