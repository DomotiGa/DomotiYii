                <?php echo $form->checkBoxControlGroup($model,'rrd', array('value'=>-1)); ?>
                <?php echo $form->checkBoxControlGroup($model,'graph', array('value'=>-1)); ?>

                <?php echo $form->textFieldControlGroup($model,'valuerrddsname',array('size'=>32,'maxlength'=>32)); ?>
                <?php echo $form->textFieldControlGroup($model,'value2rrddsname',array('size'=>32,'maxlength'=>32)); ?>
                <?php echo $form->textFieldControlGroup($model,'value3rrddsname',array('size'=>32,'maxlength'=>32)); ?>
                <?php echo $form->textFieldControlGroup($model,'value4rrddsname',array('size'=>32,'maxlength'=>32)); ?>

                <?php echo $form->dropDownListControlGroup($model,'valuerrdtype', array('GAUGE' => 'GAUGE', 'COUNTER' => 'COUNTER', 'DERIVE' => 'DERIVE', 'ABSOLUTE' => 'ABSOLUTE'), array('prompt'=>'')); ?>
                <?php echo $form->dropDownListControlGroup($model,'value2rrdtype', array('GAUGE' => 'GAUGE', 'COUNTER' => 'COUNTER', 'DERIVE' => 'DERIVE', 'ABSOLUTE' => 'ABSOLUTE'), array('prompt'=>'')); ?>
                <?php echo $form->dropDownListControlGroup($model,'value3rrdtype', array('GAUGE' => 'GAUGE', 'COUNTER' => 'COUNTER', 'DERIVE' => 'DERIVE', 'ABSOLUTE' => 'ABSOLUTE'), array('prompt'=>'')); ?>
                <?php echo $form->dropDownListControlGroup($model,'value4rrdtype', array('GAUGE' => 'GAUGE', 'COUNTER' => 'COUNTER', 'DERIVE' => 'DERIVE', 'ABSOLUTE' => 'ABSOLUTE'), array('prompt'=>'')); ?>
