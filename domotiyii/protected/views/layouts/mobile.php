<?php $this->beginContent('/layouts/main'); ?>
<div class="navbar navbar-inverse">
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'brandLabel'=>'<img height="25" width="25" src="' . Yii::app()->request->baseUrl . '/static/logo.png">',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'items'=>array(
                array('label'=>Yii::t('translate','Devices'), 'url'=> array('devices/index')),
                array('label' => Yii::t('translate','Phone'), 'url' => array('cdr/index')),
                array('label'=> Yii::t('translate','Contacts'), 'url'=> array('contacts/index')),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>Yii::t('translate','Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>Yii::t('translate','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
    ),
)); ?>
</div>


<div class="container" id="page">
	<div id="content">
	    <?php foreach(array('error', 'notice', 'success') as $key): ?>
            <?php if (Yii::app()->user->hasFlash($key)): ?>
                <div class="flash-<?php echo $key ?>">
                    <?php echo Yii::app()->user->getFlash($key) ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php echo $content; ?>
    </div>
    
    <div id="footer">
        Credits and Copyright © <?php echo date("Y"); ?> <a href="http://www.domotiga.nl/" >DomotiGa</a> <a href="mailto:support@domotiga.nl"></a> by Ron Klinkien     
        <?php
        if (  $this->browserdetect->isMobile() ) {
		    echo "| mobile <i class='icon-signal'></i>";
	    }
        ?>
	</div><!-- footer -->

</div><!-- container-fluid -->



<?php $this->endContent(); ?>
