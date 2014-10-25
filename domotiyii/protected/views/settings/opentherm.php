<?php
/* @var $this SettingsOpenthermController */
/* @var $model SettingsOpentherm */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Plugins') => 'indexPlugins',
        Yii::t('app','OpenTherm'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-opentherm-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>OpenTherm</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
                <?php echo $form->dropDownListControlGroup($model,'type', array('serial' => 'serial', 'tcp' => 'tcp'), array('onchange'=>'switchType(this);')); ?>
                <?php echo $form->textFieldControlGroup($model,'tcphost',
array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcphost')); ?>
                <?php echo $form->numberFieldControlGroup($model,'tcpport',
array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcpport')); ?>
                <?php echo $form->textFieldControlGroup($model,'serialport', array('class'=>'span5',
'readonly'=>($model->type == 'serial')? false : true, 'id'=>'serialport')); ?>

		<?php echo $form->dropDownListControlGroup($model,'thermostat', array('Other' => 'Other', 'Remeha Celcia' => 'Remeha Celcia')); ?>
		<?php echo $form->dropDownListControlGroup($model,'temperatureoverride', array('Constant' => 'Constant', 'Temporarily' => 'Temporarily')); ?>
		<?php echo $form->checkBoxControlGroup($model,'syncclock', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'relayenabled', array('onchange'=>'switchRelay(this);', 'value'=>-1)); ?>
                <?php echo $form->numberFieldControlGroup($model,'relayport', array('readonly'=>($model->relayenabled <> 0)? false : true, 'id'=>'relayport')); ?>
		<?php echo $form->numberFieldControlGroup($model,'polltime', array('append' => 'Seconds')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug' , array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
