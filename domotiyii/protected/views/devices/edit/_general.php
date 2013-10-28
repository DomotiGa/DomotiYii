
<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

                <?php echo $form->checkBoxControlGroup($model,'enabled',array('value'=>-1)); ?>
                <?php echo $form->textFieldControlGroup($model,'id',array('readonly'=>true)); ?>
                <?php echo $form->textFieldControlGroup($model,'name',array('size'=>32,'maxlength'=>32)); ?>
                <?php echo $form->dropDownListControlGroup($model,'module',$model->getDeviceTypes(), array('prompt'=>'', 'id'=>'module',
                        'ajax' =>
                        array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('UpdateModule'),
                        'update'=>'#interface',
                        ))); ?>
                <?php echo $form->textFieldControlGroup($model,'protocol', array('value'=>($model->devicetype===null)?"":$model->devicetype->type, 'readonly'=>true, 'id'=>'protocol')); ?>
                <?php echo $form->dropDownListControlGroup($model,'interface', $model->getInterfacesByDeviceType($model->module), array('id'=>'interface',
                        'ajax' =>
                        array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('UpdateInterface'),
                        'update'=>'#moduleX',
                        ))); ?>

