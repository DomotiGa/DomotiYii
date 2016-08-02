<?php
/* @var $this SettingsModbusController */
/* @var $model SettingsModbus */
/* @var $form bootstrap.widgets.TbActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Plugins') => 'indexPlugins',
        Yii::t('app','Modbus'),
    ),
)); ?>

<legend>Modbus</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'settings-modbus-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
                <?php echo $form->dropDownListControlGroup($model,'modbustype', array('RTU' => 'RTU', 'ASCII' => 'ASCII')); ?>
                <?php echo $form->dropDownListControlGroup($model,'type', array('serial' => 'serial', 'tcp' => 'tcp'), array('onchange'=>'switchTypeExtra(this);')); ?>
                <?php echo $form->textFieldControlGroup($model,'tcphost', array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcphost')); ?>
                <?php echo $form->numberFieldControlGroup($model,'tcpport', array('readonly'=>($model->type == 'serial')? true : false, 'id'=>'tcpport')); ?> <?php echo $form->textFieldControlGroup($model,'serialport', array('class'=>'span5', 'readonly'=>($model->type == 'serial')? false : true, 'id'=>'serialport')); ?>
                <?php echo $form->dropDownListControlGroup($model,'baudrate', array('9600' => '9600', '19200' => '19200', '38400' => '38400', '57600' => '57600', '115200' => '115200'), array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'baudrate')); ?>
                <?php echo $form->dropDownListControlGroup($model,'databits', array('7' => '7', '8' => '8'), array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'databits')); ?>
                <?php echo $form->dropDownListControlGroup($model,'stopbits', array('1' => '1', '2' => '2'), array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'stopbits')); ?>
                <?php echo $form->dropDownListControlGroup($model,'parity', array('0' => 'none', '1' => 'even', '2' => 'odd'), array('readonly'=>($model->type == 'serial')? false : true, 'id'=>'parity')); ?>
                <?php echo $form->numberFieldControlGroup($model,'polltime', array('append' => 'Seconds')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
