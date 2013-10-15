<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    /**
     * @var object for browser detect
    */
	public $browserdetect=null;
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/**
	 * Init function to show normal or mobile interface
	**/
	public function init()
	{
        
        $this->browserdetect = Yii::app()->mobileDetect;
      
        if (  $this->browserdetect->isMobile() ) {
		    Yii::app()->layout='//layouts/mobile';
	    }
		else
		{
			Yii::app()->layout='//layouts/normal';
		}
	}

}
