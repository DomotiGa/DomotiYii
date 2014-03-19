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
     * @var object for mobile page
    */
	public $mobile_page=null;
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
     * Default filter for access rules
    **/
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /**
     * Default access rules
    **/
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user 
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
     }

	/**
	 * Init function to show normal or mobile interface
	**/
	public function init()
	{
        $this->browserdetect = Yii::app()->mobileDetect;
        $mobile_detected = $this->browserdetect->isMobile();
        $this->mobile_page = strpos(Yii::app()->request->url,'mobile/') !== False;
        $inversemobiledetect = Yii::app()->request->getQuery('inversemobiledetect');        
    
        if($inversemobiledetect){
            if($inversemobiledetect == "True"){
                Yii::app()->session['inversemobiledetect'] = True;
            }else{
                unset(Yii::app()->session['inversemobiledetect']);
            }
        }

        if(isset(Yii::app()->session['inversemobiledetect'])){
            $mobile_detected = !$mobile_detected;  
        }

        if ( $mobile_detected !== $this->mobile_page && strpos(Yii::app()->request->url,'site/') == False) {
            if ($mobile_detected){
                $this->redirect(array('mobile/index'));        
            }else{
                $this->redirect(Yii::app()->homeUrl);
            }
        }
    

        if (  $this->mobile_page ) {
		    Yii::app()->layout='//layouts/mobile';
	    }
		else
		{
			Yii::app()->layout='//layouts/normal';
		}
	}
//    public function render($view, $data = null, $return = false) {
//        if(yii::app()->request->getParam('ajax')===NULL)
//            parent::render($view, $data, $return);
//        else
//            parent::renderPartial($view, $data, $return);
//    }

}
