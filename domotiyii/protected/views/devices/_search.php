<?php
/* @var $this DevicesController */
/* @var $model Devices */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'module'); ?>
		<?php echo $form->textField($model,'module'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value'); ?>
		<?php echo $form->textArea($model,'value',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value2'); ?>
		<?php echo $form->textArea($model,'value2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value3'); ?>
		<?php echo $form->textArea($model,'value3',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value4'); ?>
		<?php echo $form->textArea($model,'value4',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'label'); ?>
		<?php echo $form->textField($model,'label',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'label2'); ?>
		<?php echo $form->textField($model,'label2',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'label3'); ?>
		<?php echo $form->textField($model,'label3',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'label4'); ?>
		<?php echo $form->textField($model,'label4',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correction'); ?>
		<?php echo $form->textArea($model,'correction',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correction2'); ?>
		<?php echo $form->textArea($model,'correction2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correction3'); ?>
		<?php echo $form->textArea($model,'correction3',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correction4'); ?>
		<?php echo $form->textArea($model,'correction4',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'onicon'); ?>
		<?php echo $form->textField($model,'onicon',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'officon'); ?>
		<?php echo $form->textField($model,'officon',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dimicon'); ?>
		<?php echo $form->textField($model,'dimicon',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'interface'); ?>
		<?php echo $form->textField($model,'interface'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firstseen'); ?>
		<?php echo $form->textField($model,'firstseen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastseen'); ?>
		<?php echo $form->textField($model,'lastseen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enabled'); ?>
		<?php echo $form->textField($model,'enabled'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hide'); ?>
		<?php echo $form->textField($model,'hide'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log'); ?>
		<?php echo $form->textField($model,'log'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logdisplay'); ?>
		<?php echo $form->textField($model,'logdisplay'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logspeak'); ?>
		<?php echo $form->textField($model,'logspeak'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groups'); ?>
		<?php echo $form->textField($model,'groups',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rrd'); ?>
		<?php echo $form->textField($model,'rrd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'graph'); ?>
		<?php echo $form->textField($model,'graph'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batterystatus'); ?>
		<?php echo $form->textField($model,'batterystatus',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tampered'); ?>
		<?php echo $form->textField($model,'tampered'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valuerrddsname'); ?>
		<?php echo $form->textField($model,'valuerrddsname',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value2rrddsname'); ?>
		<?php echo $form->textField($model,'value2rrddsname',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value3rrddsname'); ?>
		<?php echo $form->textField($model,'value3rrddsname',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value4rrddsname'); ?>
		<?php echo $form->textField($model,'value4rrddsname',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valuerrdtype'); ?>
		<?php echo $form->textField($model,'valuerrdtype',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value2rrdtype'); ?>
		<?php echo $form->textField($model,'value2rrdtype',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value3rrdtype'); ?>
		<?php echo $form->textField($model,'value3rrdtype',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value4rrdtype'); ?>
		<?php echo $form->textField($model,'value4rrdtype',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'switchable'); ?>
		<?php echo $form->textField($model,'switchable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dimable'); ?>
		<?php echo $form->textField($model,'dimable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'extcode'); ?>
		<?php echo $form->textField($model,'extcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x'); ?>
		<?php echo $form->textField($model,'x'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'y'); ?>
		<?php echo $form->textField($model,'y'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'floorplan'); ?>
		<?php echo $form->textField($model,'floorplan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastchanged'); ?>
		<?php echo $form->textField($model,'lastchanged'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'repeatstate'); ?>
		<?php echo $form->textField($model,'repeatstate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'repeatperiod'); ?>
		<?php echo $form->textField($model,'repeatperiod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reset'); ?>
		<?php echo $form->textField($model,'reset'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resetperiod'); ?>
		<?php echo $form->textField($model,'resetperiod'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resetvalue'); ?>
		<?php echo $form->textArea($model,'resetvalue',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poll'); ?>
		<?php echo $form->textField($model,'poll'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->