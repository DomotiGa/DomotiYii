                <?php echo $form->dropDownListControlGroup($model,'condition1_id', $model->getAllConditions(), array('prompt'=>'', 'id'=>'condition1_id')); ?>
                <?php echo $form->textFieldControlGroup($model,'operand'); ?>
                <?php echo $form->dropDownListControlGroup($model,'condition2_id', $model->getAllConditions(), array('prompt'=>'', 'id'=>'condition2_id')); ?>

                <?php echo $form->checkBoxControlGroup($model,'rerunenabled', array('value'=>-1)); ?>
                <?php echo $form->textFieldControlGroup($model,'reruntype'); ?>
                <?php echo $form->textFieldControlGroup($model,'rerunvalue'); ?>

