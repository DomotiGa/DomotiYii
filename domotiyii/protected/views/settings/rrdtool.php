<?php
/* @var $this SettingsRrdtoolController */
/* @var $model SettingsRrdtool */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Interfaces') => 'indexInterfaces',
        Yii::t('app','RRDTool'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-rrdtool-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>RRDTool</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'rra',array('class'=>'span7')); ?>
		<?php echo $form->numberFieldControlGroup($model,'polltime', array('append' => 'Seconds')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
