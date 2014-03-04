                <?php echo $form->textFieldControlGroup($model,'groups',array('size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->dropDownListControlGroup($model,'location', $model->getLocations(),array('id'=>'location')); ?>

                <?php echo $form->dropDownListControlGroup($model,'floors', $model->getFloors(),array('name'=>'name')); ?>
                <?php echo $form->textFieldControlGroup($model,'x'); ?>
                <?php echo $form->textFieldControlGroup($model,'y'); ?>
