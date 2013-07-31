<?php
/* @var $this SettingsDigitempController */
/* @var $model SettingsDigitemp */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Interfaces') => '../index',
        Yii::t('translate','Digitemp'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-digitemp-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'command'); ?>
		<?php echo $form->textFieldControlGroup($model,'config'); ?>
		<?php echo $form->numberFieldControlGroup($model,'polltime', array('append' => 'Seconds')); ?>
		<?php echo $form->numberFieldControlGroup($model,'readtime', array('append' => 'mS')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('translate','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('translate','Reset')),
)); ?>
<?php $this->endWidget(); ?>
