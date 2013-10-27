                <?php echo $form->textFieldControlGroup($model,'address', array('size'=>60,'maxlength'=>64,'class'=>'span5', 'id'=>'address')); ?>
                <?php echo $form->textFieldControlGroup($model,'', array('value'=>($model->devicetype===null)?"":$model->devicetype->addressformat, 'label' => 'Address format', 'readonly'=>true, 'size'=>60,'maxlength'=>64,'class'=>'span5','id'=>'addressformat')); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>
