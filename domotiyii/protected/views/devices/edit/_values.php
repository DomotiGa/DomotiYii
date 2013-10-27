<?php echo TbHtml::controlsRow(array(
                $form->label($model,'value',array('span'=>1)),
                $form->textField($model,'value',array('label' => 'Value','span'=>4)),
                $form->textField($model,'label',array('span'=>1)),
)); ?>
<?php echo TbHtml::controlsRow(array(
                $form->label($model,'value2'),
                $form->textField($model,'value2',array('label' => 'Value','span'=>4)),
                $form->textField($model,'label2',array('span'=>1)),
)); ?>
<?php echo TbHtml::controlsRow(array(
                $form->label($model,'value3'),
                $form->textField($model,'value3',array('label' => 'Value','span'=>4)),
                $form->textField($model,'label3',array('span'=>1)),
)); ?>
<?php echo TbHtml::controlsRow(array(
                $form->label($model,'value4'),
                $form->textField($model,'value4',array('label' => 'Value','span'=>4)),
                $form->textField($model,'label4',array('span'=>1)),
)); ?>
                <?php echo $form->textFieldControlGroup($model,'correction',array('class'=>'span5')); ?>
                <?php echo $form->textFieldControlGroup($model,'correction2',array('class'=>'span5')); ?>
                <?php echo $form->textFieldControlGroup($model,'correction3',array('class'=>'span5')); ?>
                <?php echo $form->textFieldControlGroup($model,'correction4',array('class'=>'span5')); ?>
