<?php
/* @var $this DevicesController */
/* @var $model Devices */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'edit-devices-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>Device Editor</legend>

<p class="note">Fields with <span class="required">*</span> are required.</p>
<div id="main"><b>Main</b></div>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->dropDownListControlGroup($model,'module', $model->getModules(), array('prompt'=>'', 'id'=>'module', 'onchange'=>'updateDevice(this);')); ?>
		<?php echo $form->textFieldControlGroup($model,'', array('value' =>$model->devicetype->type, 'readonly'=>true, 'id'=>'type')); ?>
		<?php echo $form->dropDownListControlGroup($model,'interface', $model->getInterfaces(),array('prompt'=>'', 'id'=>'interface')); ?>

<div id="main"><b>Identification</b></div>

		<?php echo $form->textFieldControlGroup($model,'address', array('size'=>60,'maxlength'=>64,'class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'', array('value' =>$model->devicetype->addressformat, 'label' => 'Address format', 'readonly'=>true, 'size'=>60,'maxlength'=>64,'class'=>'span5')); ?>

<div id="main"><b>Values</b></div>

		<?php echo $form->textFieldControlGroup($model,'value',array('class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'value2',array('class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'value3',array('class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'value4',array('class'=>'span5')); ?>

		<?php echo $form->textFieldControlGroup($model,'label',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->textFieldControlGroup($model,'label2',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->textFieldControlGroup($model,'label3',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->textFieldControlGroup($model,'label4',array('size'=>32,'maxlength'=>32)); ?>

		<?php echo $form->textFieldControlGroup($model,'correction',array('class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'correction2',array('class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'correction3',array('class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'correction4',array('class'=>'span5')); ?>

		<?php echo $form->textFieldControlGroup($model,'onicon',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->textFieldControlGroup($model,'dimicon',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->textFieldControlGroup($model,'officon',array('size'=>32,'maxlength'=>32)); ?>

<div id="main"><b>Groups</b></div>

		<?php echo $form->textFieldControlGroup($model,'groups',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->dropDownListControlGroup($model,'location', $model->getLocations(),array('id'=>'location')); ?>

<div id="main"><b>Floorplans</b></div>

		<?php echo $form->dropDownListControlGroup($model,'floors', $model->getFloors(),array('name'=>'name')); ?>
		<?php echo $form->textFieldControlGroup($model,'x'); ?>
		<?php echo $form->textFieldControlGroup($model,'y'); ?>

<div id="main"><b>Graph</b></div>

		<?php echo $form->checkBoxControlGroup($model,'rrd', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'graph', array('value'=>-1)); ?>

		<?php echo $form->textFieldControlGroup($model,'valuerrddsname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->textFieldControlGroup($model,'value2rrddsname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->textFieldControlGroup($model,'value3rrddsname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->textFieldControlGroup($model,'value4rrddsname',array('size'=>32,'maxlength'=>32)); ?>

		<?php echo $form->dropDownListControlGroup($model,'valuerrdtype', array('GAUGE' => 'GAUGE', 'COUNTER' => 'COUNTER', 'DERIVE' => 'DERIVE', 'ABSOLUTE' => 'ABSOLUTE'), array('prompt'=>'')); ?>
		<?php echo $form->dropDownListControlGroup($model,'value2rrdtype', array('GAUGE' => 'GAUGE', 'COUNTER' => 'COUNTER', 'DERIVE' => 'DERIVE', 'ABSOLUTE' => 'ABSOLUTE'), array('prompt'=>'')); ?>
		<?php echo $form->dropDownListControlGroup($model,'value3rrdtype', array('GAUGE' => 'GAUGE', 'COUNTER' => 'COUNTER', 'DERIVE' => 'DERIVE', 'ABSOLUTE' => 'ABSOLUTE'), array('prompt'=>'')); ?>
		<?php echo $form->dropDownListControlGroup($model,'value4rrdtype', array('GAUGE' => 'GAUGE', 'COUNTER' => 'COUNTER', 'DERIVE' => 'DERIVE', 'ABSOLUTE' => 'ABSOLUTE'), array('prompt'=>'')); ?>

<div id="main"><b>Options</b></div>

		<?php echo $form->checkBoxControlGroup($model,'switchable', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'dimable', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'extcode', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'hide', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'log', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'logspeak', array('value'=>-1)); ?>
		<?php echo $form->checkBoxControlGroup($model,'logdisplay', array('value'=>-1)); ?>

		<?php echo $form->checkBoxControlGroup($model,'reset', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'resetvalue'); ?>
		<?php echo $form->numberFieldControlGroup($model,'resetperiod'); ?>

		<?php echo $form->checkBoxControlGroup($model,'repeatstate', array('value'=>-1)); ?>
		<?php echo $form->numberFieldControlGroup($model,'repeatperiod'); ?>

		<?php echo $form->checkBoxControlGroup($model,'poll', array('value'=>-1)); ?>

<div id="main"><b>Status</b></div>

		<?php echo $form->textFieldControlGroup($model,'firstseen'); ?>
		<?php echo $form->textFieldControlGroup($model,'lastseen'); ?>
		<?php echo $form->textFieldControlGroup($model,'lastchanged'); ?>
		<?php echo $form->textFieldControlGroup($model,'batterystatus',array('size'=>32,'maxlength'=>32)); ?>

		<?php echo $form->textAreaControlGroup($model,'comments',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
