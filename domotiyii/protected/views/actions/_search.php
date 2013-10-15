<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-actions-form',
        'action'=>Yii::app()->createUrl($this->route),
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'method'=>'get',
));  ?>

<fieldset>

                <?php echo $form->textFieldControlGroup($model,'name'); ?>
                <?php echo $form->textFieldControlGroup($model,'description',array('class'=>'span5')); ?>
                <?php echo $form->textFieldControlGroup($model,'type',array('class'=>'span6')); ?> 

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('translate','Search'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY,'buttonType'=>'submit', 'type'=>'primary', 'icon'=>'search white', 'label'=>'Search')),
    TbHtml::resetButton(Yii::t('translate','Clear'), array('buttonType'=>'button', 'icon'=>'icon-remove-sign white', 'label'=>'Reset')),
));

$this->endWidget();

$cs = Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerCoreScript('jquery.ui');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/bootstrap/jquery-ui.css');
?>

 <script>
        $(".btnreset").click(function(){
                $(":input","#search-actions-form").each(function() {
                var type = this.type;
                var tag = this.tagName.toLowerCase(); // normalize case
                if (type == "text" || type == "password" || tag == "textarea") this.value = "";
                else if (type == "checkbox" || type == "radio") this.checked = false;
                else if (tag == "select") this.selectedIndex = "";
          });
        });
 </script>
