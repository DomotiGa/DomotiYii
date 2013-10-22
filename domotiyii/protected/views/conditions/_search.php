<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-conditions-form',
        'action'=>Yii::app()->createUrl($this->route),
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'method'=>'get',
));  ?>

<fieldset>
                <?php echo $form->textFieldControlGroup($model,'name'); ?>
                <?php echo $form->textFieldControlGroup($model,'description'); ?>
                <?php echo $form->textFieldControlGroup($model,'formula'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('translate','Search'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY,'buttonType'=>'submit', 'type'=>'primary', 'icon'=>'search white', 'label'=>'Search')),
    TbHtml::resetButton(Yii::t('translate','Reset'), array('buttonType'=>'button', 'icon'=>'icon-remove-sign white', 'label'=>'Reset')),
));

$this->endWidget();
?>

 <script>
        $(".btnreset").click(function(){
                $(":input","#search-conditions-form").each(function() {
                var type = this.type;
                var tag = this.tagName.toLowerCase(); // normalize case
                if (type == "text" || type == "password" || tag == "textarea") this.value = "";
                else if (type == "checkbox" || type == "radio") this.checked = false;
                else if (tag == "select") this.selectedIndex = "";
          });
        });
 </script>
