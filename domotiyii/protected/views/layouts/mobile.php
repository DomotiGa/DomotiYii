<?php $this->beginContent('/layouts/main'); ?>
<script type="text/javascript">
    window.refreshMobile = <?php echo Yii::app()->params['refreshMobile'] ?>;
</script>

<div data-role="page" class="container" id="page">
  <div data-role="header" data-position="fixed">
	<?php
	if( isset(Yii::app()->session['inversemobiledetect']) ){
		echo "<a href='/domotiyii/index.php?inversemobiledetect=False' data-role='button' target='_self'>Normal layout</a>";
	}else{
		echo "<a href='?inversemobiledetect=True' data-role='button' target='_self'>Mobile layout</a> ";
	}
	?>
	<?php if (!Yii::app()->user->isGuest){ ?>
		<a href="<?php echo Yii::app()->createAbsoluteUrl('site/logout'); ?>" data-role='button' target='_self'>Logout</a>
	<?php } else { ?>
		<!--<a href='mobile_login' data-role='button'>Login</a>-->
	<?php } ?>
	
	<h1>         
	<?php
	if (  $this->browserdetect->isMobile() ) {
		echo "<img src='" . Yii::app()->request->baseUrl ."/static/logo.png' style='width:25px;height:25px'>";
	} else {
		echo "<img src='" . Yii::app()->request->baseUrl ."/static/logo.png' style='width:25px;height:25px'>"; 
		//echo Yii::app()->session['inversemobiledetect'];
	}
	?>
	</h1>
  </div><!-- /header -->
  
	<div data-role="content" id="content">
	    <?php foreach(array('error', 'notice', 'success') as $key): ?>
            <?php if (Yii::app()->user->hasFlash($key)): ?>
                <div class="flash-<?php echo $key ?>">
                    <?php echo Yii::app()->user->getFlash($key) ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php echo $content; ?>
    </div>

  <div data-role="footer" data-position="fixed">
    <div data-role="navbar">
      <ul>
        <li><a href="index" id='device' data-role='button' data-icon="arrow-u" target="_self">Control</a></li>
        <li><a href="scene" id='scene' data-role='button' data-icon="arrow-u" target="_self">Scene</a></li>
        <!--<li><a href="graphs" data-role='button' data-icon="arrow-u">Graphs</a></li>-->
      </ul>
    </div>
  </div>
</div><!-- container-fluid -->

<?php $this->endContent(); ?>