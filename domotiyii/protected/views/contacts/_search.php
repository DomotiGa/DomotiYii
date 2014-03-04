<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-contacts-form',
        'action'=>Yii::app()->createUrl($this->route),
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'method'=>'get',
));  ?>

<fieldset>
                <?php echo $form->textFieldControlGroup($model,'name'); ?>
                <?php echo $form->textFieldControlGroup($model,'address', array('class'=>'span5')); ?>
                <?php echo $form->textFieldControlGroup($model,'zipcode'); ?>
                <?php echo $form->textFieldControlGroup($model,'city'); ?>
                <?php echo $form->textFieldControlGroup($model,'phoneno', array('class'=>'span5')); ?>
                <?php echo $form->textFieldControlGroup($model,'mobileno', array('class'=>'span5')); ?>
                <?php echo $form->textFieldControlGroup($model,'email', array('class'=>'span5')); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Search'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY,'buttonType'=>'submit', 'type'=>'primary', 'icon'=>'search white', 'label'=>'Search')),
    TbHtml::resetButton(Yii::t('app','Reset'), array('buttonType'=>'button', 'icon'=>'icon-remove-sign white', 'label'=>'Reset')),
));

$this->endWidget();
?>

 <script>
        $(".btnreset").click(function(){
                $(":input","#search-contacts-form").each(function() {
                var type = this.type;
                var tag = this.tagName.toLowerCase(); // normalize case
                if (type == "text" || type == "password" || tag == "textarea") this.value = "";
                else if (type == "checkbox" || type == "radio") this.checked = false;
                else if (tag == "select") this.selectedIndex = "";
          });
        });
 </script>
