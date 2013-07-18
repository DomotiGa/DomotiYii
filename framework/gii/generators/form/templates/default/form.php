<?php
/**
 * This is the template for generating a form script file.
 * The following variables are available in this template:
 * - $this: the FormCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getModelClass(); ?>Controller */
/* @var $model <?php echo $this->getModelClass(); ?> */
/* @var $form CActiveForm */
?>

<?php echo "<?php \$form=\$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'".$this->class2id($this->modelClass)."-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>\n"; ?>

<?php echo "<fieldset>\n" ?>
<?php echo "<legend>... Settings</legend>\n" ?>

<?php foreach($this->getModelAttributes() as $attribute): ?>
		<?php echo "<?php echo \$form->textFieldControlGroup(\$model,'$attribute'); ?>\n"; ?>
<?php endforeach; ?>

<?php echo "</fieldset>\n" ?>

<?php echo "<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('Reset'),
)); ?>\n"; ?>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
