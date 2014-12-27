                <?php echo $form->dropDownListControlGroup($model,'condition1_id', $model->getAllConditions(), array('prompt'=>'', 'id'=>'condition1_id')); ?>
                <?php echo $form->textFieldControlGroup($model,'operand'); ?>
                <?php echo $form->dropDownListControlGroup($model,'condition2_id', $model->getAllConditions(), array('prompt'=>'', 'id'=>'condition2_id')); ?>

                <?php echo $form->checkBoxControlGroup($model,'rerunenabled', array('value'=>-1)); ?>
                <?php echo $form->textFieldControlGroup($model,'rerunvalue'); ?>
                <?php echo $form->dropDownListControlGroup($model,'reruntype', array('gb.Second' => 'Seconds', 'gb.Minute' => 'Minutes', 'gb.Hour' => 'Hours', 'gb.Day' => 'Days', 'gb.Month' => 'Months', 'gb.Quarter' => 'Quarters', 'gb.Year' => 'Years')); ?>
