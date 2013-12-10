                <?php echo $form->dropDownListControlGroup($model,'condition1', $model->getAllConditions(), array('prompt'=>'', 'id'=>'condition1')); ?>
                <?php echo $form->textFieldControlGroup($model,'operand'); ?>
                <?php echo $form->dropDownListControlGroup($model,'condition2', $model->getAllConditions(), array('prompt'=>'', 'id'=>'condition2')); ?>

                <?php echo $form->checkBoxControlGroup($model,'rerunenabled', array('value'=>-1)); ?>
                <?php echo $form->textFieldControlGroup($model,'reruntype'); ?>
                <?php echo $form->textFieldControlGroup($model,'rerunvalue'); ?>

