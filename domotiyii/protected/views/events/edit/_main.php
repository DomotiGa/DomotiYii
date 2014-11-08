<p class="note"><?php echo Yii::t('app','Fields with <span class="required">*</span> are required.') ?></p>

                <?php echo $form->checkBoxControlGroup($model,'enabled', array('value'=>-1)); ?>
                <?php echo $form->textFieldControlGroup($model,'name'); ?>
                <?php echo $form->dropDownListControlGroup($model,'category_id', $model->getAllCategories(), array('prompt'=>'', 'id'=>'category_id')); ?>

                <?php echo $form->textFieldControlGroup($model,'comments'); ?>

