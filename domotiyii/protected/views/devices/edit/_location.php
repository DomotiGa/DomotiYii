<?php
    // Remove wrong string form instead array of checkbox list
    $cs = Yii::app()->getClientScript();
    $cs->registerScript("checkboxgroups", '$( document ).ready(function() { $("#ytDevices_groupsarray").remove(); });');

?>

                <?php //echo $form->textFieldControlGroup($model,'groups',array('size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->inlineCheckBoxListControlGroup($model,'groupsarray',CHtml::listData(Groups::model()->findAll(),'name','name'),array('label'=>Yii::t('app','Groups'),'size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->dropDownListControlGroup($model,'location_id', $model->getLocations(),array('id'=>'location_id')); ?>

                <?php echo $form->dropDownListControlGroup($model,'floorplan_id', $model->getFloors(),array('floor'=>'name')); ?>
                <?php echo $form->textFieldControlGroup($model,'x'); ?>
                <?php echo $form->textFieldControlGroup($model,'y'); ?>
