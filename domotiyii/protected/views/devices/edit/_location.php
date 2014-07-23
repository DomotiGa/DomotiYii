                <?php //echo $form->textFieldControlGroup($model,'groups',array('size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->inlineCheckBoxListControlGroup($model,'groupsarray',CHtml::listData(Groups::model()->findAll(),'name','name'),array('label'=>Yii::t('app','Groups'),'size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->dropDownListControlGroup($model,'location', $model->getLocations(),array('id'=>'location')); ?>

                <?php echo $form->dropDownListControlGroup($model,'floorplan', $model->getFloors(),array('floor'=>'name')); ?>
                <?php echo $form->textFieldControlGroup($model,'x'); ?>
                <?php echo $form->textFieldControlGroup($model,'y'); ?>
