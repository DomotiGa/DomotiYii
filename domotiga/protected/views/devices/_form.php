<?php
/* @var $this DevicesController */
/* @var $model Devices */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devices-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'module'); ?>
		<?php echo $form->textField($model,'module'); ?>
		<?php echo $form->error($model,'module'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textArea($model,'value',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value2'); ?>
		<?php echo $form->textArea($model,'value2',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'value2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value3'); ?>
		<?php echo $form->textArea($model,'value3',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'value3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value4'); ?>
		<?php echo $form->textArea($model,'value4',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'value4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'label'); ?>
		<?php echo $form->textField($model,'label',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'label2'); ?>
		<?php echo $form->textField($model,'label2',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'label2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'label3'); ?>
		<?php echo $form->textField($model,'label3',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'label3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'label4'); ?>
		<?php echo $form->textField($model,'label4',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'label4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correction'); ?>
		<?php echo $form->textArea($model,'correction',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'correction'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correction2'); ?>
		<?php echo $form->textArea($model,'correction2',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'correction2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correction3'); ?>
		<?php echo $form->textArea($model,'correction3',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'correction3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correction4'); ?>
		<?php echo $form->textArea($model,'correction4',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'correction4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'onicon'); ?>
		<?php echo $form->textField($model,'onicon',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'onicon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'officon'); ?>
		<?php echo $form->textField($model,'officon',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'officon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dimicon'); ?>
		<?php echo $form->textField($model,'dimicon',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'dimicon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interface'); ?>
		<?php echo $form->textField($model,'interface'); ?>
		<?php echo $form->error($model,'interface'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstseen'); ?>
		<?php echo $form->textField($model,'firstseen'); ?>
		<?php echo $form->error($model,'firstseen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastseen'); ?>
		<?php echo $form->textField($model,'lastseen'); ?>
		<?php echo $form->error($model,'lastseen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->textField($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hide'); ?>
		<?php echo $form->textField($model,'hide'); ?>
		<?php echo $form->error($model,'hide'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log'); ?>
		<?php echo $form->textField($model,'log'); ?>
		<?php echo $form->error($model,'log'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logdisplay'); ?>
		<?php echo $form->textField($model,'logdisplay'); ?>
		<?php echo $form->error($model,'logdisplay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logspeak'); ?>
		<?php echo $form->textField($model,'logspeak'); ?>
		<?php echo $form->error($model,'logspeak'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'groups'); ?>
		<?php echo $form->textField($model,'groups',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'groups'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rrd'); ?>
		<?php echo $form->textField($model,'rrd'); ?>
		<?php echo $form->error($model,'rrd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'graph'); ?>
		<?php echo $form->textField($model,'graph'); ?>
		<?php echo $form->error($model,'graph'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'batterystatus'); ?>
		<?php echo $form->textField($model,'batterystatus',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'batterystatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tampered'); ?>
		<?php echo $form->textField($model,'tampered'); ?>
		<?php echo $form->error($model,'tampered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valuerrddsname'); ?>
		<?php echo $form->textField($model,'valuerrddsname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'valuerrddsname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value2rrddsname'); ?>
		<?php echo $form->textField($model,'value2rrddsname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'value2rrddsname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value3rrddsname'); ?>
		<?php echo $form->textField($model,'value3rrddsname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'value3rrddsname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value4rrddsname'); ?>
		<?php echo $form->textField($model,'value4rrddsname',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'value4rrddsname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valuerrdtype'); ?>
		<?php echo $form->textField($model,'valuerrdtype',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'valuerrdtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value2rrdtype'); ?>
		<?php echo $form->textField($model,'value2rrdtype',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'value2rrdtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value3rrdtype'); ?>
		<?php echo $form->textField($model,'value3rrdtype',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'value3rrdtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value4rrdtype'); ?>
		<?php echo $form->textField($model,'value4rrdtype',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'value4rrdtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'switchable'); ?>
		<?php echo $form->textField($model,'switchable'); ?>
		<?php echo $form->error($model,'switchable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dimable'); ?>
		<?php echo $form->textField($model,'dimable'); ?>
		<?php echo $form->error($model,'dimable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'extcode'); ?>
		<?php echo $form->textField($model,'extcode'); ?>
		<?php echo $form->error($model,'extcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x'); ?>
		<?php echo $form->textField($model,'x'); ?>
		<?php echo $form->error($model,'x'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'y'); ?>
		<?php echo $form->textField($model,'y'); ?>
		<?php echo $form->error($model,'y'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'floorplan'); ?>
		<?php echo $form->textField($model,'floorplan'); ?>
		<?php echo $form->error($model,'floorplan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastchanged'); ?>
		<?php echo $form->textField($model,'lastchanged'); ?>
		<?php echo $form->error($model,'lastchanged'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repeatstate'); ?>
		<?php echo $form->textField($model,'repeatstate'); ?>
		<?php echo $form->error($model,'repeatstate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repeatperiod'); ?>
		<?php echo $form->textField($model,'repeatperiod'); ?>
		<?php echo $form->error($model,'repeatperiod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reset'); ?>
		<?php echo $form->textField($model,'reset'); ?>
		<?php echo $form->error($model,'reset'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resetperiod'); ?>
		<?php echo $form->textField($model,'resetperiod'); ?>
		<?php echo $form->error($model,'resetperiod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resetvalue'); ?>
		<?php echo $form->textArea($model,'resetvalue',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'resetvalue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poll'); ?>
		<?php echo $form->textField($model,'poll'); ?>
		<?php echo $form->error($model,'poll'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->