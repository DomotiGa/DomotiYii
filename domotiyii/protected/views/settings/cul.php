<?php
/* @var $this SettingsCulController */
/* @var $model SettingsCul */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Interfaces') => '../index',
        Yii::t('app','CUL'),
    ),
));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-cul-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<legend>CUL - CC1101 USB Lite</legend>
<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
                <?php echo $form->dropDownListControlGroup($model,'type', array('serial' => 'serial', 'tcp' => 'tcp'), array('onchange'=>'switchType(this);')); ?>
                <?php echo $form->textFieldControlGroup($model,'tcphost', array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcphost')); ?>
                <?php echo $form->numberFieldControlGroup($model,'tcpport', array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcpport')); ?>
                <?php echo $form->textFieldControlGroup($model,'serialport', array('class'=>'span5', 'readonly'=>($model->type == 'serial')? false : true, 'id'=>'serialport')); ?>
                <?php echo $form->dropDownListControlGroup($model,'baudrate', array('9600' => '9600', '19200' => '19200', '38400' => '38400', '57600' => '57600', '115200' => '115200'), array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'baudrate')); ?>
		<?php echo $form->dropDownListControlGroup($model,'model', array('1' => 'CUL', '2' => 'CUN', '3' => 'CUNO', '4' => 'CUR')); ?>
		<?php echo $form->numberFieldControlGroup($model,'fhtid'); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
