<?php
/**
 * Based upon:
 * LiveTbGridView class file based on CLiveGridView code by Nisanth Thulasi
 * CLiveGridView class file based on CGridView class file by Qiang Xue
 * Ref :http://www.yiiframework.com/forum/index.php/topic/10258-clivegridview/
 *
 */

Yii::import('bootstrap.widgets.TbGridView');

/**
 * CLiveGridView continuously refreshes the visible data items in the body of the TbGridView table
 *
 **/
class LiveGridView extends TbGridView
{
	/**
	 * grid update interval in milliseconds
	 * @var integer
	 */
	public $refreshTime = 6000;

	public function registerClientScript()
    {
		// attach ajax events
		$updateParameters = array();
		
		if (isset($this->ajaxUpdateError))
			$updateParameters['ajaxUpdateError'] = (strpos($this->ajaxUpdateError,'js:')!==0 ? 'js:' : ''). $this->ajaxUpdateError;
		if (isset($this->afterAjaxUpdate))
			$updateParameters['afterAjaxUpdate'] = (strpos($this->afterAjaxUpdate,'js:')!==0 ? 'js:' : ''). $this->afterAjaxUpdate;
		if (isset($this->beforeAjaxUpdate))
			$updateParameters['beforeAjaxUpdate'] = (strpos($this->beforeAjaxUpdate,'js:')!==0 ? 'js:' : '').$this->beforeAjaxUpdate;
		parent::registerClientScript();
		
		$id = $this->getId();
		$cs = Yii::app()->getClientScript();
		
		$cs->registerScriptFile( Yii::app()->getAssetManager()->publish( __DIR__ .'/assets' ) .'/js/jquery.yiilivegridview.js' );
		$cs->registerScript( __CLASS__.'# '.$id,"jQuery('#$id').yiiLiveGridView();" );
		$cs->registerScript( __CLASS__.'# '.$id.'-live',
		"setInterval(function(){;$.fn.yiiLiveGridView.update( '$id', ". CJavaScript::encode($updateParameters) .");}, {$this->refreshTime});"
		);
    }
}
