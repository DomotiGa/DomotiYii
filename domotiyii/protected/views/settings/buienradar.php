<?php
/* @var $this SettingsBuienradarController */
/* @var $model SettingsBuienradar */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','Buienradar'),
    ),
)); ?>

<legend>Buienradar</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','Buienradar'), 'icon'=>'icon-globe', 'url'=>'http://buienradar.nl', 'linkOptions'=>array('target'=>'_blank')),
                array('label'=>Yii::t('app','API'), 'icon'=>'icon-globe', 'url'=>'http://gratisweerdata.buienradar.nl/', 'linkOptions'=>array('target'=>'_blank')),
                array('label'=>Yii::t('app','Lat/Lon'), 'icon'=>'icon-globe', 'url'=>'http://www.gps-coordinates.net/', 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'setttings-buienradar-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
                <?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
                <?php echo $form->textFieldControlGroup($model,'urlbuienradar', array('class'=>'span5')); ?>
                <?php echo $form->textFieldControlGroup($model,'latitude'); ?>
                <?php echo $form->textFieldControlGroup($model,'longitude'); ?>
                <?php echo $form->textFieldControlGroup($model,'city'); ?>
                <?php echo $form->numberFieldControlGroup($model,'polltime', array('append' => 'Seconds')); ?>
		<?php echo $form->dropDownListControlGroup($model,'output', array('integer 0-255' => 'integer 0-255', 'mm/h' => 'mm/h')); ?>
                <?php echo $form->numberFieldControlGroup($model,'outputprecision'); ?>
                <?php echo $form->numberFieldControlGroup($model,'devmaxvalue'); ?>
                <?php echo $form->numberFieldControlGroup($model,'devtimevalue'); ?>
                <?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1, 'help'=>Yii::t('app','For more info key click \'API\''))); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
