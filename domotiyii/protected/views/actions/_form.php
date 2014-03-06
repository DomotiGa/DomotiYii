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

<fieldset <?php if (isset($readonly)) echo "disabled"; ?>>
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
    TbHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), array('class' => 'btUpdate', 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset', array('class' => 'btReset')),
));
?>
<?php $this->endWidget(); ?>
<?php
Yii::app()->clientScript->registerScript('dynamicForm', "
//dynamic form with jquery
        $('#type').addClass('span3');
        $('#type').on('change', function(e) {
            var v = $('#type').val();
            adaptForm(v);
        });
        adaptForm($('#type').val());
        viewOnly();
", CClientScript::POS_READY);
?>
<script>
    function fieldSet(id, name, visible, type) {
        var sel = 'Actions_param' + id;

        if (visible === "SHOW") {
            $('#' + sel).show();
            $('[for=' + sel + ']').show();
            $('[for=' + sel + ']').text(name); //if ajax translation failed we have a text instead of empty field name
            $.get('<?php echo Yii::app()->homeUrl ?>/AjaxUtil/Translate', {name: name}, function(data) {
                $('[for=' + sel + ']').text(data.text);
            }, 'json');
            if (type === 'textarea' && $('textarea #' + sel).length === 0) {
                var old = $('#' + sel);
                var textarea = $('<textarea  rows=4 cols=60 name="Actions[param' + id + ']" id="Actions_param' + id + '" type="text" style="display: inline-block;">' + old.val() + '</textarea>');
                old.replaceWith(textarea);
            } else if (type === 'input' && $('input #' + sel).length === 0) {
                var old = $('#' + sel);
                var oldText = old.val();
                var textinput = $('<input  name="Actions[param' + id + ']" id="Actions_param' + id + '" type="text"  style="display: inline-block;">');
                old.replaceWith(textinput);
                $('#' + sel).val(oldText);
            } else if (type === 'select' && name === 'Device id') {
                var old = $('#' + sel);
                var oldText = old.val();
                var textinput = $('<span id="sel' + id + '"></span>');
                old.replaceWith(textinput);
                $.get('<?php echo Yii::app()->homeUrl ?>/AjaxUtil/getDeviceListSelect', {id: oldText}, function(data) {
                    $('#sel' + id).html('<select  name="Actions[param' + id + ']" id="Actions_param' + id + '" style="display: inline-block;">' + data);
                    viewOnly();
                });
            } else if (type === 'select' && name === 'Globalvar name') {
                var old = $('#' + sel);
                var oldText = old.val();
                var textinput = $('<span id="sel' + id + '"></span>');
                old.replaceWith(textinput);
                $.get('<?php echo Yii::app()->homeUrl ?>/AjaxUtil/getGlobalVarListSelect', {id: oldText}, function(data) {
                    $('#sel' + id).html('<select  name="Actions[param' + id + ']" id="Actions_param' + id + '" style="display: inline-block;">' + data);
                    viewOnly();
                });
            } else if (type === 'select' && name === 'Value number') {
                var old = $('#' + sel);
                var oldText = old.val();
                var textinput = $('<span id="sel' + id + '"></span>');
                var buff='';
                old.replaceWith(textinput);
                buff='<select  name="Actions[param' + id + ']" id="Actions_param' + id + '" style="display: inline-block;">';
                for (var x = 1; x < 5; x++)
                    buff+='<option>' + x;
                buff+='</select>';
                $('#sel' + id).html(buff);
                viewOnly();
            }
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
            fieldSet(x, 'Param' + x, 'SHOW', 'input');
    }
    function adaptForm(id) {
        hideAll();
        if (id == 1) {
            fieldSet(1, 'Device id', 'SHOW', 'select');
            fieldSet(2, 'Value number', 'SHOW', 'select');
            fieldSet(3, 'Value', 'SHOW', 'input');
        } else if (id == 2) {
            fieldSet(1, 'Globalvar name', 'SHOW', 'select');
            fieldSet(2, 'Value', 'SHOW', 'input');
        } else if (id == 3) {
            fieldSet(1, 'To address', 'SHOW', 'input');
            fieldSet(2, 'Subject', 'SHOW', 'input');
            fieldSet(3, 'Body', 'SHOW', 'textarea');
        } else if (id == 4) {
            fieldSet(1, 'Speak text', 'SHOW', 'textarea');
        } else if (id == 5) {
            fieldSet(1, 'Execute CMD', 'SHOW', 'textarea');
        } else if (id == 6) {
            fieldSet(1, 'Tweet message', 'SHOW', 'textarea');
        } else if (id == 7) {
            fieldSet(1, 'SMS Number', 'SHOW', 'input');
            fieldSet(2, 'Message', 'SHOW', 'textarea');
        } else if (id == 8) {
            fieldSet(1, 'Command string', 'SHOW', 'input');
        } else if (id == 9) {
            fieldSet(1, 'Sound file', 'SHOW', 'input');
            fieldSet(2, 'Volume', 'SHOW', 'input');
        } else if (id == 10) {
            fieldSet(1, 'Log text', 'SHOW', 'textarea');
        } else if (id == 11) {
            fieldSet(1, 'Message to display', 'SHOW', 'textarea');
            fieldSet(2, 'Display id', 'SHOW', 'input');
            fieldSet(3, 'Color', 'SHOW', 'input');
            fieldSet(4, 'Speed', 'SHOW', 'input');
        } else if (id == 12) {
            fieldSet(1, 'Model', 'SHOW', 'input');
            fieldSet(2, 'Command id', 'SHOW', 'input');
            fieldSet(3, 'Value', 'SHOW', 'input');
            fieldSet(4, 'Address', 'SHOW', 'input');
        } else if (id == 13) {
            fieldSet(1, 'Delay', 'SHOW', 'input');
            fieldSet(2, 'Random max seconds', 'SHOW', 'input');
            fieldSet(3, 'Mode (fixe or random)', 'SHOW', 'input');
        } else if (id == 14) {
            fieldSet(1, 'Title', 'SHOW', 'input');
            fieldSet(2, 'Text', 'SHOW', 'textarea');
        } else if (id == 15) {
            fieldSet(1, 'Script', 'SHOW', 'textarea');
        } else if (id == 16) {
            fieldSet(1, 'Device id', 'SHOW', 'select');
            fieldSet(2, 'Post/Get', 'SHOW', 'input');
            fieldSet(3, 'Url', 'SHOW', 'textarea');
        } else if (id == 17) {
            fieldSet(1, 'Prowl message to send', 'SHOW', 'textarea');
        } else if (id == 18) {
            fieldSet(1, 'Notify My Android message to send', 'SHOW', 'textarea');
        } else if (id == 19) {
            fieldSet(1, 'Pushover message to send', 'SHOW', 'textarea');
        } else {
            showAll();
        }
    }
    function viewOnly() {
<?php if (isset($readonly)): ?>
            $('select').each(function() {
                var id = $(this).attr('id');
                var text = $(this).find(':selected').text();
                var newfield = '<input class="span5" style="width:100%" type="text" name="' + id + '" value="' + text + '">';
                newfield = '<span class="readOnlyValue">' + text + '</span>';
                $(this).replaceWith(newfield);
            });
            $('input, textarea').each(function() {
                var id = $(this).attr('id');
                var text = $(this).val();
                var newfield = '<input class="span5" style="width:100%" type="text" name="' + id + '" value="' + text + '">';
                newfield = '<span class="readOnlyValue">' + text + '</span>';
                $(this).replaceWith(newfield);
            });
            $('textarea, input, select').css('background-color', '#f9f9f9').css('border', '1px solid lightgrey').removeClass('span3').addClass('span5');
            $('.control-group').css('background-color', '#f9f9f9').css('margin', '5px');
            $('label').removeClass('required').css('font-weight', 'bold').css('border', 'none');
            $('.required,.note,.form-actions').remove();
<?php endif ?>
    }

</script>
