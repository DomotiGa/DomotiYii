<?php $this->beginContent('/layouts/main'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<div style="padding: 8px 0;" id="sidebar">
				<?php $this->widget('bootstrap.widgets.TbNav', array(
					'type' => TbHtml::NAV_TYPE_LIST,
					'items' => array(
 						array('label' => 'MENU'),
  						array('label' => Yii::t('translate','Devices'), 'url' => array('/devices/index'),'icon'=>'magic'),
   						array('label' => Yii::t('translate','Phone'), 'url' => array('cdr/index'), 'icon'=>'phone'),
						TbHtml::menuDivider(),
						array('label' => 'Help', 'url' => '#'),
					)
				));
				?>
			</div><!-- sidebar -->
		</div><!-- span2 -->
		<div class="span10">
			<div style="padding: 8px 0;" id="content">
				<?php echo $content; ?>
			</div><!-- content -->
		</div><!-- span10 -->
	</div><!-- row-fluid -->
</div><!-- container-fluid -->
<?php $this->endContent(); ?>
