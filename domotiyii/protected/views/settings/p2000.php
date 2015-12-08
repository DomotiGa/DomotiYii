<?php
/* @var $this SettingsP2000Controller */
/* @var $model SettingsP0000 */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','Modules') => 'indexModules',
        Yii::t('app','P2000'),
    ),
)); ?>

<legend>P2000 Scanner</legend>
<?php $this->beginWidget('zii.widgets.CPortlet', array(
        'htmlOptions'=>array(
                'class'=>''
        )
));
$this->widget('bootstrap.widgets.TbNav', array(
        'type'=>TbHtml::NAV_TYPE_PILLS,
        'items'=>array(
                array('label'=>Yii::t('app','P2000 Live'), 'icon'=>'icon-globe', 'url'=>'http://monitor.livep2000.nl/', 'linkOptions'=>array('target'=>'_blank')),
        ),
));
$this->endWidget();

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'settings-p2000-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->dropDownListControlGroup($model,'regioarray', array('0'=>'Alle', '13'=>'Amsterdam-Amstelland', '21'=>'Brabant Noord', '22'=>'Brabant Zuid en Oost', '3'=>'Drenthe', '25'=>'Flevoland', '2'=>'Friesland', '7'=>'Gelderland Midden', '8'=>'Gelderland Zuid', '14'=>'Gooi en Vechtstreek', '1'=>'Groningen', '15'=>'Haaglanden', '16'=>'Hollands Midden', '4'=>'IJsselland', '12'=>'Kennemerland', '23'=>'Limburg Noord', '24'=>'Limburg Zuid', '20'=>'Midden- en West-Brabant', '18'=>'Zuid Holland Zuid', '6'=>'Noord en Oost Gelderland', '10'=>'Noord Holland Noord', '17'=>'Rotterdam Rijnmond', '5'=>'Twente', '9'=>'Utrecht', '11'=>'Zaanstreek-Waterland', '19'=>'Zeeland'), array('multiple'=>true,'id'=>'regioarray')); ?>
		<?php echo $form->dropDownListControlGroup($model,'disciplinearray', array('0'=>'Alle', '1'=>'Ambulance', '2'=>'Brandweer', '3'=>'Politie', '4' => 'KNMR'), array('multiple'=>true,'id'=>'disciplinearray')); ?>
		<?php echo $form->numberFieldControlGroup($model,'messages', array('append'=>'Msgs')); ?>
		<?php echo $form->textFieldControlGroup($model,'filter', array('help'=>Yii::t('app','Only display messages containing this text'))); ?>
		<?php echo $form->textFieldControlGroup($model,'georange', array('append'=>'Meters', 'help'=>Yii::t('app','Enter 0 to disable range check'))); ?>
		<?php echo $form->checkBoxControlGroup($model,'fetchimage', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'maplink', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'polltime', array('append'=>'Seconds')); ?>
		<?php echo $form->checkBoxControlGroup($model,'debug', array('value'=>-1)); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Submit'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton(Yii::t('app','Reset')),
)); ?>
<?php $this->endWidget(); ?>
