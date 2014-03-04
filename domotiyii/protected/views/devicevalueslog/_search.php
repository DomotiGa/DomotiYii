<?php
/* @var $this DeviceValuesLogController */
/* @var $model DeviceValuesLog */
/* @var $form CActiveForm */
?>

<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'search-DeviceValuesLog-form',
        'action'=>Yii::app()->createUrl($this->route),
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'method'=>'get',
));  ?>

<fieldset>
		<?php echo $form->dropDownListControlGroup($model,'device_id', $model->getDevices(), array('prompt'=>'', 'id'=>'device_id')); ?>

</fieldset>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton(Yii::t('app','Search'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY,'buttonType'=>'submit', 'type'=>'primary', 'icon'=>'search white', 'label'=>'Search')),
    TbHtml::resetButton(Yii::t('app','Reset'), array('buttonType'=>'button', 'icon'=>'icon-remove-sign white', 'label'=>'Reset')),
));

$this->endWidget();
?>

 <script>
        $(".btnreset").click(function(){
                $(":input","#search-DeviceValuesLog-form").each(function() {
                var type = this.type;
                var tag = this.tagName.toLowerCase(); // normalize case
                if (type == "text" || type == "password" || tag == "textarea") this.value = "";
                else if (type == "checkbox" || type == "radio") this.checked = false;
                else if (tag == "select") this.selectedIndex = "";
          });
        });
 </script>
