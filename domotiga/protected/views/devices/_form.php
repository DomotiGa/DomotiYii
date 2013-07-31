<?php
/* @var $this DevicesController */
/* @var $model Devices */
/* @var $form CActiveForm */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('translate','Devices') => '../index',
        Yii::t('translate','Device Editor'),
    ),
)); 

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'edit-devices-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
<legend>Device Editor</legend>

<div class="accordion" id="accordion1">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseMain">
        General
      </a>
    </div>
    <div id="collapseMain" class="accordion-body collapse in">
      <div class="accordion-inner">
<p class="note">Fields with <span class="required">*</span> are required.</p>

<div id="main"><b>General</b></div>

		<?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
		<?php echo $form->textFieldControlGroup($model,'id',array('readonly'=>true)); ?>
		<?php echo $form->textFieldControlGroup($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->dropDownListControlGroup($model,'module', $model->getModules(), array('prompt'=>'', 'id'=>'module', 'onchange'=>'updateDevice(this);')); ?>
		<?php echo $form->textFieldControlGroup($model,'', array('value' =>$model->devicetype->type, 'readonly'=>true, 'id'=>'type')); ?>
		<?php echo $form->dropDownListControlGroup($model,'interface', $model->getInterfaces(),array('prompt'=>'', 'id'=>'interface')); ?>

<div id="main"><b>Identification</b></div>

		<?php echo $form->textFieldControlGroup($model,'address', array('size'=>60,'maxlength'=>64,'class'=>'span5')); ?>
		<?php echo $form->textFieldControlGroup($model,'', array('value' =>$model->devicetype->addressformat, 'label' => 'Address format', 'readonly'=>true, 'size'=>60,'maxlength'=>64,'class'=>'span5')); ?>

      </div>
    </div>
  </div>

  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseValues">
        Values
      </a>
    </div>
    <div id="collapseValues" class="accordion-body collapse">
      <div class="accordion-inner">

<div id="main"><b>Raw Values</b></div>

<?php echo TbHtml::controlsRow(array(
		$form->textField($model,'value',array('label' => 'Value','span'=>4)),
		$form->textField($model,'label',array('span'=>1)),
)); ?>
<?php echo TbHtml::controlsRow(array(
		$form->textField($model,'value2',array('label' => 'Value','span'=>4)),
		$form->textField($model,'label2',array('span'=>1)),
)); ?>
<?php echo TbHtml::controlsRow(array(
		$form->textField($model,'value3',array('label' => 'Value','span'=>4)),
		$form->textField($model,'label3',array('span'=>1)),
)); ?>
<?php echo TbHtml::controlsRow(array(
		$form->textField($model,'value4',array('label' => 'Value','span'=>4)),
		$form->textField($model,'label4',array('span'=>1)),
)); ?>
		<?php echo $form->textFieldControlGroup($model,'value2',array('class'=>'span5')); ?>
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

      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseGroups">
        Groups
      </a>
    </div>
    <div id="collapseGroups" class="accordion-body collapse">
      <div class="accordion-inner">
<div id="main"><b>Groups</b></div>

		<?php echo $form->textFieldControlGroup($model,'groups',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->dropDownListControlGroup($model,'location', $model->getLocations(),array('id'=>'location')); ?>

<div id="main"><b>Floorplans</b></div>

		<?php echo $form->dropDownListControlGroup($model,'floors', $model->getFloors(),array('name'=>'name')); ?>
		<?php echo $form->textFieldControlGroup($model,'x'); ?>
		<?php echo $form->textFieldControlGroup($model,'y'); ?>
      </div>
    </div>
  </div>
   <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseGraphs">
        Graphing
      </a>
    </div>
    <div id="collapseGraphs" class="accordion-body collapse">
      <div class="accordion-inner">
<div id="main"><b>Graphs</b></div>

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

      </div>
    </div>
  </div>

   <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOptions">
        Options
      </a>
    </div>
    <div id="collapseOptions" class="accordion-body collapse">
      <div class="accordion-inner">
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
      </div>
    </div>
  </div>

  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseStatus">
        Status
      </a>
    </div>
    <div id="collapseStatus" class="accordion-body collapse">
      <div class="accordion-inner">
<div id="main"><b>Status</b></div>

		<?php echo $form->textFieldControlGroup($model,'firstseen'); ?>
		<?php echo $form->textFieldControlGroup($model,'lastseen'); ?>
		<?php echo $form->textFieldControlGroup($model,'lastchanged'); ?>
		<?php echo $form->textFieldControlGroup($model,'batterystatus',array('size'=>32,'maxlength'=>32)); ?>

		<?php echo $form->textAreaControlGroup($model,'comments',array('rows'=>3, 'cols'=>50, 'class'=>'span5')); ?>
      </div>
    </div>
  </div>

</div>


</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>
<?php $this->endWidget(); ?>
