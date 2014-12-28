<?php
/* @var $this SettingsBroadcastudpController */
/* @var $model SettingsBroadcastudp */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','Broadcast UDP'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-broadcastudp-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>Broadcast UDP</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'udpport'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
