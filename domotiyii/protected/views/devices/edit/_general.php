<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

                <?php echo $form->checkBoxControlGroup($model,'enabled',array('value'=>-1, 'selected'=>$model->isNewRecord )); ?>
                <?php echo $model->isNewRecord ? "": $form->textFieldControlGroup($model,'id',array('readonly'=>true)); ?>
                <?php echo $form->textFieldControlGroup($model,'name', array('size'=>32,'maxlength'=>32)); ?>
                <?php echo $form->dropDownListControlGroup($model,'protocol',$model->getDeviceProtocols(), array('prompt'=>'', 'id'=>'protocol',
                        'ajax' =>
                        array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('UpdateDeviceType'),
                        'dataType'=>'json',
			'data'=>array('protocol'=>'js:$(this).val()'),
			'success'=>'function(data) {
				$("#devicetype_id").html(data.dropDownDeviceType);
				$("#interface").html(data.dropDownInterface);
			}',
                        ))); ?>

                <?php echo $form->dropDownListControlGroup($model,'devicetype_id',$model->getDeviceTypes(), array('prompt'=>'', 'id'=>'devicetype_id',
                        'ajax' =>
                        array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('UpdateAddressFormat'),
                        'update'=>'#addressformat',
			'data'=>array('devicetype_id'=>'js:$(this).val()'),
                        ))); ?>
                <?php echo $form->dropDownListControlGroup($model,'interface',$model->getInterfacesByDeviceModel($model->devicetype_id), array('prompt'=>'', 'id'=>'interface',
                        'ajax' =>
                        array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('UpdateAddressFormat2'),
                        'update'=>'#addressformat2',
                        ))); ?>
                <?php echo $form->textFieldControlGroup($model,'address', array('size'=>60,'maxlength'=>64,'class'=>'span5', 'id'=>'address')); ?>
                <?php echo $form->textFieldControlGroup($model,'addressformat', array('value'=>($model->devicetype===null)?"":$model->devicetype->addressformat, 'readonly'=>true, 'size'=>60,'maxlength'=>64,'class'=>'span5','id'=>'addressformat')); ?>
