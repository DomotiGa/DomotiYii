     		<?php echo $form->checkBoxControlGroup($model,'switchable', array('value'=>-1)); ?>
                <?php echo $form->checkBoxControlGroup($model,'reset', array('value'=>-1)); ?>
                <?php echo $form->checkBoxControlGroup($model,'dimable', array('value'=>-1)); ?>
                <?php echo $form->checkBoxControlGroup($model,'extcode', array('value'=>-1)); ?>
                <?php echo $form->checkBoxControlGroup($model,'hide', array('value'=>-1)); ?>
                <?php echo $form->textFieldControlGroup($model,'resetvalue'); ?>
                <?php echo $form->numberFieldControlGroup($model,'resetperiod', array('append' => Yii::t('app','Minutes'))); ?>
                <?php echo $form->checkBoxControlGroup($model,'repeatstate', array('value'=>-1)); ?>
                <?php echo $form->numberFieldControlGroup($model,'repeatperiod', array('append' => Yii::t('app','Minutes'))); ?>
                <?php echo $form->checkBoxControlGroup($model,'poll', array('value'=>-1)); ?>
