<?php $this->beginContent('/layouts/main'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div id="sidebar">
<?php $this->widget('bootstrap.widgets.TbNav', array(
    'type' => TbHtml::NAV_TYPE_LIST,
    'items' => array(
        array('label' => 'List header'),
        array('label' => Yii::t('translate','Devices'), 'url' => array('/devices/index'),'icon'=>'magic'),
        array('label' => Yii::t('translate','Phone'), 'url' => array('cdr/index'), 'icon'=>'phone'),
        TbHtml::menuDivider(),
        array('label' => 'Help', 'url' => '#'),
    )
));
?>
			</div><!-- sidebar -->
		</div><!-- span3 -->
		<div class="span9">
			<div id="content">
				<?php echo $content; ?>
			</div><!-- content -->
		</div><!-- span9 -->
	</div><!-- row-fluid -->
</div><!-- container-fluid -->
<?php $this->endContent(); ?>
