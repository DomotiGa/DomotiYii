<?php
/* @var $this SettingsPvoutputController */
/* @var $model SettingsPvoutput */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => '../index',
        Yii::t('app','PVoutput'),
    ),
)); ?>

<legend>PVOutput</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','Your PVOutput Page'), 'icon'=>'icon-globe', 'url'=>'http://www.pvoutput.org/list.jsp?sid='.$model->pvoutputid, 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-pvoutput-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'api',array('class'=>'span7')); ?>
		<?php echo $form->numberFieldControlGroup($model,'pvoutputid'); ?>
		<?php echo $form->dropDownListControlGroup($model,'deviceid',Devices::getDevices(), array('prompt'=>'', 'id'=>'deviceid')); ?>

                <?php echo $form->dropDownListControlGroup($model,'devicevalue', array('0' => '', '1' => 'Value1', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->dropDownListControlGroup($model,'usagedeviceid',Devices::getDevices(), array('prompt'=>'', 'id'=>'usagedeviceid')); ?>
                <?php echo $form->dropDownListControlGroup($model,'usagedevicevalue', array('0' => '', '1' => 'Value1', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->dropDownListControlGroup($model,'tempdeviceid',Devices::getDevices(), array('prompt'=>'', 'id'=>'tempdeviceid')); ?>
                <?php echo $form->dropDownListControlGroup($model,'tempdevicevalue', array('0' => '', '1' => 'Value1', '2' => 'Value2', '3' => 'Value3', '4' => 'Value4')); ?>
		<?php echo $form->numberFieldControlGroup($model,'pushtime', array('append' => 'Seconds')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
