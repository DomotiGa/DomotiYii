<?php
/* @var $this ActionsController */
/* @var $model Controllers */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'actions-form',
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    ));
?>

<fieldset>
    <p class="note"><?php echo Yii::t('app', 'Fields with <span class="required">*</span> are required.') ?></p>

    <?php echo $form->textFieldControlGroup($model, 'name'); ?>
    <?php echo $form->textFieldControlGroup($model, 'description', array('class' => 'span5')); ?>
    <?php echo $form->dropDownListControlGroup($model, 'type', $model->getAllActionTypes(), array('prompt' => '', 'id' => 'type')); ?>
    <?php echo $form->textFieldControlGroup($model, 'param1'); ?>
    <?php echo $form->textFieldControlGroup($model, 'param2'); ?>
    <?php echo $form->textFieldControlGroup($model, 'param3'); ?>
    <?php echo $form->textFieldControlGroup($model, 'param4'); ?>
    <?php echo $form->textFieldControlGroup($model, 'param5'); ?>
</fieldset>

<?php
echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
));
?>
<?php $this->endWidget(); ?>
<?php
Yii::app()->clientScript->registerScript('dynamicForm', "
//Some try to do dynamic form [PATOCHE]
        $('#type').on('change', function(e) {
            var v = $('#type').val();
            adaptForm(v);
        });
        adaptForm($('#type').val());
", CClientScript::POS_READY);
?>
<script>
    function fieldSet(id, name, visible) {
        var sel = 'Actions_param' + id;
        if (typeof visible === undefined || visible === "SHOW") {
            $('#' + sel).show();
            $('[for=' + sel + ']').show();
            $('[for=' + sel + ']').text(name);
        } else {
            $('#' + sel).hide();
            $('[for=' + sel + ']').hide();
        }
    }
    function hideAll() {
        for (var x = 1; x < 6; x++)
            fieldSet(x, null, 'HIDE');
    }
    function showAll() {
        for (var x = 1; x < 6; x++)
            fieldSet(x, null, 'SHOW');
    }
    function adaptForm(id) {
        hideAll();
        if (id == 1) {
            fieldSet(1, 'Device id', 'SHOW');
            fieldSet(2, 'Field name', 'SHOW');
            fieldSet(3, 'Value', 'SHOW');
        } else if (id == 2) {
            fieldSet(1, 'Globalvar name', 'SHOW');
            fieldSet(2, 'Value', 'SHOW');
        } else if (id == 3) {
            fieldSet(1, 'To address', 'SHOW');
            fieldSet(2, 'Subject', 'SHOW');
            fieldSet(3, 'Body', 'SHOW');
        } else {
            showAll();
        }
    }

</script>
