<?php

class SettingsController extends Controller
{

public function actionRazberry()
{
    $model = SettingsRazberry::model()->findByPk(1);

    if(isset($_POST['SettingsRazberry']))
    {
        $model->attributes=$_POST['SettingsRazberry'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            $model->save();
            $this->do_xmlrpc("module.restart","razberry");
        }
    }
    $this->render('razberry',array('model'=>$model));
}

public function actionGenericio()
{
    $model = SettingsGenericio::model()->findByPk(1);

    if(isset($_POST['SettingsGenericio']))
    {
        $model->attributes=$_POST['SettingsGenericio'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            $model->save();
            $this->do_xmlrpc("module.restart","genericio");
        }
    }
    $this->render('genericio',array('model'=>$model));
}

public function actionWeatherug()
{
    $model = SettingsWeatherug::model()->findByPk(1);

    if(isset($_POST['SettingsWeatherug']))
    {
        $model->attributes=$_POST['SettingsWeatherug'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            $model->save();
            $this->do_xmlrpc("module.restart","weatherug");
        }
    }
    $this->render('weatherug',array('model'=>$model));
}

public function actionNMA()
{
    $model = SettingsNMA::model()->findByPk(1);

    if(isset($_POST['SettingsNMA']))
    {
        $model->attributes=$_POST['SettingsNMA'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            $model->save();
            $this->do_xmlrpc("module.restart","NMA");
        }
    }
    $this->render('NMA',array('model'=>$model));
}

public function actionPushover()
{
    $model = SettingsPushover::model()->findByPk(1);

    if(isset($_POST['SettingsPushover']))
    {
        $model->attributes=$_POST['SettingsPushover'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            $model->save();
            $this->do_xmlrpc("module.restart","pushover");
        }
    }
    $this->render('pushover',array('model'=>$model));
}

public function actionProwl()
{
    $model = SettingsProwl::model()->findByPk(1);

    if(isset($_POST['SettingsProwl']))
    {
        $model->attributes=$_POST['SettingsProwl'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            $model->save();
            $this->do_xmlrpc("module.restart","prowl");
        }
    }
    $this->render('prowl',array('model'=>$model));
}

public function actionKmtronicudp()
{
    $model = SettingsKmtronicudp::model()->findByPk(1);

    if(isset($_POST['SettingsKmtronicudp']))
    {
        $model->attributes=$_POST['SettingsKmtronicudp'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            $model->save();
            $this->do_xmlrpc("module.restart","kmtronicudp");
        }
    }
    $this->render('kmtronicudp',array('model'=>$model));
}

public function actionVisonic()
{
    $model = SettingsVisonic::model()->findByPk(1);

    if(isset($_POST['SettingsVisonic']))
    {
        $model->attributes=$_POST['SettingsVisonic'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            $model->save();
            $this->do_xmlrpc("module.restart","visonic");
        }
    }
    $this->render('visonic',array('model'=>$model));
}

public function actionPvoutput()
{
    $model = SettingsPvoutput::model()->findByPk(1);

    if(isset($_POST['SettingsPvoutput']))
    {
        $model->attributes=$_POST['SettingsPvoutput'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            $model->save();
            $this->do_xmlrpc("module.restart","pvoutput");
        }
    }
    $this->render('pvoutput',array('model'=>$model));
}

public function actionMqtt()
{
    $model = SettingsMqtt::model()->findByPk(1);

    if(isset($_POST['SettingsMqtt']))
    {
        $model->attributes=$_POST['SettingsMqtt'];
        if($model->validate())
        {
            // form inputs are valid, do something here
           $model->save();
	   $this->do_xmlrpc("module.restart","mqtt");
        }
    }
    $this->render('mqtt',array('model'=>$model));
}

public function actionSmartvisu()
{
    $model = SettingsSmartvisu::model()->findByPk(1);

    if(isset($_POST['SettingsSmartvisu']))
    {
        $model->attributes=$_POST['SettingsSmartvisu'];
        if($model->validate())
        {
            // form inputs are valid, do something here
           $model->save();
	   $this->do_xmlrpc("module.restart","smartvisu");
        }
    }
    $this->render('smartvisu',array('model'=>$model));
}

public function actionFritzbox()
{
    $model = SettingsFritzbox::model()->findByPk(1);

    if(isset($_POST['SettingsFritzbox']))
    {
        $model->attributes=$_POST['SettingsFritzbox'];
        if($model->validate())
      	{
           // form inputs are valid, do something here
           $model->save();
	   $this->do_xmlrpc("module.restart","fritzbox");
        }
    }
    $this->render('fritzbox',array('model'=>$model));
}

public function actionRfxcomtrx()
{
    $model = SettingsRfxcomtrx::model()->findByPk(1);

    if(isset($_POST['SettingsRfxcomtrx']))
    {
        $model->attributes=$_POST['SettingsRfxcomtrx'];
        if($model->validate())
        {
       	    // form inputs are valid, do something here
       	    $model->save();
	    $this->do_xmlrpc("module.restart","rfxcomtrx");
       	}
    }
    $this->render('rfxcomtrx',array('model'=>$model));
}

public function actionAsterisk()
{
    $model = SettingsAsterisk::model()->findByPk(1);

    if(isset($_POST['SettingsAsterisk']))
    {
        $model->attributes=$_POST['SettingsAsterisk'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
	   $this->do_xmlrpc("module.restart","asterisk");
        }
    }
    $this->render('asterisk',array('model'=>$model));
}

public function actionMain()
{
    $model= SettingsMain::model()->findByPk(1);

    if(isset($_POST['SettingsMain']))
    {
        $model->attributes=$_POST['SettingsMain'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $this->do_save($model);
        }
    }
    $this->render('main',array('model'=>$model));
}

public function actionCallerid()
{
    $model= SettingsCallerid::model()->findByPk(1);

    if(isset($_POST['SettingsCallerid']))
    {
        $model->attributes=$_POST['SettingsCallerid'];
        if($model->validate())
        {
            // form inputs are valid, do something here
  	    $this->do_save($model);
        }
    }
    $this->render('callerid',array('model'=>$model));
}

public function actionAstro()
{
    $model=SettingsAstro::model()->findByPk(1);

    if(isset($_POST['SettingsAstro']))
    {
        $model->attributes=$_POST['SettingsAstro'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
	   $this->do_xmlrpc("module.restart","astro");
        }
    }
    $this->render('astro',array('model'=>$model));
}

public function actionEmail()
{
    $model=SettingsEmail::model()->findByPk(1);

    if(isset($_POST['SettingsEmail']))
    {
        $model->attributes=$_POST['SettingsEmail'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
	   $this->do_xmlrpc("module.restart","email");
        }
    }
    $this->render('email',array('model'=>$model));
}

public function actionGmail()
{
    $model=SettingsGmail::model()->findByPk(1);

    if(isset($_POST['SettingsGmail']))
    {
        $model->attributes=$_POST['SettingsGmail'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","gmail");
        }
    }
    $this->render('gmail',array('model'=>$model));
}

public function actionTwitter()
{
    $model=SettingsTwitter::model()->findByPk(1);

    if(isset($_POST['SettingsTwitter']))
    {
        $model->attributes=$_POST['SettingsTwitter'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","twitter");
        }
    }
    $this->render('twitter',array('model'=>$model));
}

public function actionSound()
{
    $model=SettingsSound::model()->findByPk(1);

    if(isset($_POST['SettingsSound']))
    {
        $model->attributes=$_POST['SettingsSound'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","sound");
        }
    }
    $this->render('sound',array('model'=>$model));
}

public function actionVoicetext()
{
    $model=SettingsVoicetext::model()->findByPk(1);

    if(isset($_POST['SettingsVoicetext']))
    {
        $model->attributes=$_POST['SettingsVoicetext'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","voicetext");
        }
    }
    $this->render('voicetext',array('model'=>$model));
}

public function actionTelnetserver()
{
    $model=SettingsTelnetserver::model()->findByPk(1);

    if(isset($_POST['SettingsTelnetserver']))
    {
        $model->attributes=$_POST['SettingsTelnetserver'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","telnetserver");
        }
    }
    $this->render('telnetserver',array('model'=>$model));
}

public function actionWeatherbug()
{
    $model=SettingsWeatherbug::model()->findByPk(1);

    if(isset($_POST['SettingsWeatherbug']))
    {
        $model->attributes=$_POST['SettingsWeatherbug'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","weatherbug");
        }
    }
    $this->render('weatherbug',array('model'=>$model));
}

public function actionServerstats()
{
    $model=SettingsServerstats::model()->findByPk(1);

    if(isset($_POST['SettingsServerstats']))
    {
        $model->attributes=$_POST['SettingsServerstats'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","serverstats");
        }
    }
    $this->render('serverstats',array('model'=>$model));
}

public function actionTvguide()
{
    $model=SettingsTvguide::model()->findByPk(1);

    if(isset($_POST['SettingsTvguide']))
    {
        $model->attributes=$_POST['SettingsTvguide'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","tvguide");
        }
    }
    $this->render('tvguide',array('model'=>$model));
}

public function actionXmlrpc()
{
    $model=SettingsXmlrpc::model()->findByPk(1);

    if(isset($_POST['SettingsXmlrpc']))
    {
        $model->attributes=$_POST['SettingsXmlrpc'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
        }
    }
    $this->render('xmlrpc',array('model'=>$model));
}

public function actionThermostat()
{
    $model=SettingsThermostat::model()->findByPk(1);

    if(isset($_POST['SettingsThermostat']))
    {
        $model->attributes=$_POST['SettingsThermostat'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","thermostat");
        }
    }
    $this->render('thermostat',array('model'=>$model));
}

public function actionBwiredmap()
{
    $model=SettingsBwiredmap::model()->findByPk(1);

    if(isset($_POST['SettingsBwiredmap']))
    {
        $model->attributes=$_POST['SettingsBwiredmap'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","bwiredmap");
        }
    }
    $this->render('bwiredmap',array('model'=>$model));
}

public function actionPachube()
{
    $model=SettingsPachube::model()->findByPk(1);

    if(isset($_POST['SettingsPachube']))
    {
        $model->attributes=$_POST['SettingsPachube'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","pachube");
        }
    }
    $this->render('pachube',array('model'=>$model));
}

public function actionTemperaturnu()
{
    $model=SettingsTemperaturnu::model()->findByPk(1);

    if(isset($_POST['SettingsTemperaturnu']))
    {
        $model->attributes=$_POST['SettingsTemperaturnu'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","temperaturnu");
        }
    }
    $this->render('temperaturnu',array('model'=>$model));
}

public function actionDigitemp()
{
    $model=SettingsDigitemp::model()->findByPk(1);

    if(isset($_POST['SettingsDigitemp']))
    {
        $model->attributes=$_POST['SettingsDigitemp'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","digitemp");
        }
    }
    $this->render('digitemp',array('model'=>$model));
}

public function actionTemp08()
{
    $model=SettingsTemp08::model()->findByPk(1);

    if(isset($_POST['SettingsTemp08']))
    {
        $model->attributes=$_POST['SettingsTemp08'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","temp08");
        }
    }
    $this->render('temp08',array('model'=>$model));
}

public function actionOwfs()
{
    $model=SettingsOwfs::model()->findByPk(1);

    if(isset($_POST['SettingsOwfs']))
    {
        $model->attributes=$_POST['SettingsOwfs'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","owfs");
        }
    }
    $this->render('owfs',array('model'=>$model));
}

public function actionOww()
{
    $model=SettingsOww::model()->findByPk(1);

    if(isset($_POST['SettingsOww']))
    {
        $model->attributes=$_POST['SettingsOww'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","oww");
        }
    }
    $this->render('oww',array('model'=>$model));
}

public function actionDenon()
{
    $model=SettingsDenon::model()->findByPk(1);

    if(isset($_POST['SettingsDenon']))
    {
        $model->attributes=$_POST['SettingsDenon'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","denon");
        }
    }
    $this->render('denon',array('model'=>$model));
}

public function actionIport()
{
    $model=SettingsIport::model()->findByPk(1);

    if(isset($_POST['SettingsIport']))
    {
        $model->attributes=$_POST['SettingsIport'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","iport");
        }
    }
    $this->render('iport',array('model'=>$model));
}

public function actionLgtv()
{
    $model=SettingsLgtv::model()->findByPk(1);

    if(isset($_POST['SettingsLgtv']))
    {
        $model->attributes=$_POST['SettingsLgtv'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","lgtv");
        }
    }
    $this->render('lgtv',array('model'=>$model));
}

public function actionOnkyo()
{
    $model=SettingsOnkyo::model()->findByPk(1);

    if(isset($_POST['SettingsOnkyo']))
    {
        $model->attributes=$_POST['SettingsOnkyo'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","onkyo");
        }
    }
    $this->render('onkyo',array('model'=>$model));
}

public function actionSharptv()
{
    $model=SettingsSharptv::model()->findByPk(1);

    if(isset($_POST['SettingsSharptv']))
    {
        $model->attributes=$_POST['SettingsSharptv'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","sharptv");
        }
    }
    $this->render('sharptv',array('model'=>$model));
}

public function actionSqueezeserver()
{
    $model=SettingsSqueezeserver::model()->findByPk(1);

    if(isset($_POST['SettingsSqueezeserver']))
    {
        $model->attributes=$_POST['SettingsSqueezeserver'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","squeezeserver");
        }
    }
    $this->render('squeezeserver',array('model'=>$model));
}

public function actionNcid()
{
    $model=SettingsNcid::model()->findByPk(1);

    if(isset($_POST['SettingsNcid']))
    {
        $model->attributes=$_POST['SettingsNcid'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","ncid");
        }
    }
    $this->render('ncid',array('model'=>$model));
}

public function actionCul()
{
    $model=SettingsCul::model()->findByPk(1);

    if(isset($_POST['SettingsCul']))
    {
        $model->attributes=$_POST['SettingsCul'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","cul");
        }
    }
    $this->render('cul',array('model'=>$model));
}

public function actionVideoserver()
{
    $model=SettingsVideoserver::model()->findByPk(1);

    if(isset($_POST['SettingsVideoserver']))
    {
        $model->attributes=$_POST['SettingsVideoserver'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","videoserver");
        }
    }
    $this->render('videoserver',array('model'=>$model));
}

public function actionVisca()
{
    $model=SettingsVisca::model()->findByPk(1);

    if(isset($_POST['SettingsVisca']))
    {
        $model->attributes=$_POST['SettingsVisca'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","visca");
        }
    }
    $this->render('visca',array('model'=>$model));
}

public function actionPwrctrl()
{
    $model=SettingsPwrctrl::model()->findByPk(1);

    if(isset($_POST['SettingsPwrctrl']))
    {
        $model->attributes=$_POST['SettingsPwrctrl'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","pwrctrl");
        }
    }
    $this->render('pwrctrl',array('model'=>$model));
}

public function actionEzcontrol()
{
    $model=SettingsEzcontrol::model()->findByPk(1);

    if(isset($_POST['SettingsEzcontrol']))
    {
        $model->attributes=$_POST['SettingsEzcontrol'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","ezcontrol");
        }
    }
    $this->render('ezcontrol',array('model'=>$model));
}

public function actionEib()
{
    $model=SettingsEib::model()->findByPk(1);

    if(isset($_POST['SettingsEib']))
    {
        $model->attributes=$_POST['SettingsEib'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","eib");
        }
    }
    $this->render('eib',array('model'=>$model));
}

public function actionPlcbus()
{
    $model=SettingsPlcbus::model()->findByPk(1);

    if(isset($_POST['SettingsPlcbus']))
    {
        $model->attributes=$_POST['SettingsPlcbus'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","plcbus");
        }
    }
    $this->render('plcbus',array('model'=>$model));
}

public function actionX10cmd()
{
    $model=SettingsX10cmd::model()->findByPk(1);

    if(isset($_POST['SettingsX10cmd']))
    {
        $model->attributes=$_POST['SettingsX10cmd'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","x10cmd");
        }
    }
    $this->render('x10cmd',array('model'=>$model));
}

public function actionCtx35()
{
    $model=SettingsCtx35::model()->findByPk(1);

    if(isset($_POST['SettingsCtx35']))
    {
        $model->attributes=$_POST['SettingsCtx35'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","ctx35");
        }
    }
    $this->render('ctx35',array('model'=>$model));
}

public function actionOpenzwave()
{
    $model=SettingsOpenzwave::model()->findByPk(1);

    if(isset($_POST['SettingsOpenzwave']))
    {
        $model->attributes=$_POST['SettingsOpenzwave'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","zwave");
        }
    }
    $this->render('openzwave',array('model'=>$model));
}

public function actionDsc()
{
    $model=SettingsDsc::model()->findByPk(1);

    if(isset($_POST['SettingsDsc']))
    {
        $model->attributes=$_POST['SettingsDsc'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","dsc");
        }
    }
    $this->render('dsc',array('model'=>$model));
}

public function actionCurrentcost()
{
    $model=SettingsCurrentcost::model()->findByPk(1);

    if(isset($_POST['SettingsCurrentcost']))
    {
        $model->attributes=$_POST['SettingsCurrentcost'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","currentcost");
        }
    }
    $this->render('currentcost',array('model'=>$model));
}

public function actionPlugwise()
{
    $model=SettingsPlugwise::model()->findByPk(1);

    if(isset($_POST['SettingsPlugwise']))
    {
        $model->attributes=$_POST['SettingsPlugwise'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","plugwise");
        }
    }
    $this->render('plugwise',array('model'=>$model));
}

public function actionNta8130()
{
    $model=SettingsNta8130::model()->findByPk(1);

    if(isset($_POST['SettingsNta8130']))
    {
        $model->attributes=$_POST['SettingsNta8130'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","nta8130");
        }
    }
    $this->render('nta8130',array('model'=>$model));
}

public function actionHddtemp()
{
    $model=SettingsHddtemp::model()->findByPk(1);

    if(isset($_POST['SettingsHddtemp']))
    {
        $model->attributes=$_POST['SettingsHddtemp'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","hddtemp");
        }
    }
    $this->render('hddtemp',array('model'=>$model));
}

public function actionHomematic()
{
    $model=SettingsHomematic::model()->findByPk(1);

    if(isset($_POST['SettingsHomematic']))
    {
        $model->attributes=$_POST['SettingsHomematic'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","homematic");
        }
    }
    $this->render('homematic',array('model'=>$model));
}

public function actionK8055()
{
    $model=SettingsK8055::model()->findByPk(1);

    if(isset($_POST['SettingsK8055']))
    {
        $model->attributes=$_POST['SettingsK8055'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","k8055");
        }
    }
    $this->render('k8055',array('model'=>$model));
}

public function actionWeeder()
{
    $model=SettingsWeeder::model()->findByPk(1);

    if(isset($_POST['SettingsWeeder']))
    {
        $model->attributes=$_POST['SettingsWeeder'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","weeder");
        }
    }
    $this->render('weeder',array('model'=>$model));
}

public function actionIviewer()
{
    $model=SettingsIviewer::model()->findByPk(1);

    if(isset($_POST['SettingsIviewer']))
    {
        $model->attributes=$_POST['SettingsIviewer'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","iviewer");
        }
    }
    $this->render('iviewer',array('model'=>$model));
}

public function actionIrman()
{
    $model=SettingsIrman::model()->findByPk(1);

    if(isset($_POST['SettingsIrman']))
    {
        $model->attributes=$_POST['SettingsIrman'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","irman");
        }
    }
    $this->render('irman',array('model'=>$model));
}

public function actionIrtrans()
{
    $model=SettingsIrtrans::model()->findByPk(1);

    if(isset($_POST['SettingsIrtrans']))
    {
        $model->attributes=$_POST['SettingsIrtrans'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","irtrans");
        }
    }
    $this->render('irtrans',array('model'=>$model));
}

public function actionLirc()
{
    $model=SettingsLirc::model()->findByPk(1);

    if(isset($_POST['SettingsLirc']))
    {
        $model->attributes=$_POST['SettingsLirc'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","lirc");
        }
    }
    $this->render('lirc',array('model'=>$model));
}

public function actionJeelabs()
{
    $model=SettingsJeelabs::model()->findByPk(1);

    if(isset($_POST['SettingsJeelabs']))
    {
        $model->attributes=$_POST['SettingsJeelabs'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","jeelabs");
        }
    }
    $this->render('jeelabs',array('model'=>$model));
}

public function actionLedmatrix()
{
    $model=SettingsLedmatrix::model()->findByPk(1);

    if(isset($_POST['SettingsLedmatrix']))
    {
        $model->attributes=$_POST['SettingsLedmatrix'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","ledmatrix");
        }
    }
    $this->render('ledmatrix',array('model'=>$model));
}

public function actionBluetooth()
{
    $model=SettingsBluetooth::model()->findByPk(1);

    if(isset($_POST['SettingsBluetooth']))
    {
        $model->attributes=$_POST['SettingsBluetooth'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","bluetooth");
        }
    }
    $this->render('bluetooth',array('model'=>$model));
}

public function actionSms()
{
    $model=SettingsSms::model()->findByPk(1);

    if(isset($_POST['SettingsSms']))
    {
        $model->attributes=$_POST['SettingsSms'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","sms");
        }
    }
    $this->render('sms',array('model'=>$model));
}

public function actionPing()
{
    $model=SettingsPing::model()->findByPk(1);

    if(isset($_POST['SettingsPing']))
    {
        $model->attributes=$_POST['SettingsPing'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","ping");
        }
    }
    $this->render('ping',array('model'=>$model));
}

public function actionGps()
{
    $model=SettingsGps::model()->findByPk(1);

    if(isset($_POST['SettingsGps']))
    {
        $model->attributes=$_POST['SettingsGps'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","gps");
        }
    }
    $this->render('gps',array('model'=>$model));
}

public function actionOpentherm()
{
    $model=SettingsOpentherm::model()->findByPk(1);

    if(isset($_POST['SettingsOpentherm']))
    {
        $model->attributes=$_POST['SettingsOpentherm'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","opentherm");
        }
    }
    $this->render('opentherm',array('model'=>$model));
}

public function actionRrdtool()
{
    $model=SettingsRrdtool::model()->findByPk(1);

    if(isset($_POST['SettingsRrdtool']))
    {
        $model->attributes=$_POST['SettingsRrdtool'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","rrdtool");
        }
    }
    $this->render('rrdtool',array('model'=>$model));
}

public function actionRfxcomrx()
{
    $model=SettingsRfxcomrx::model()->findByPk(1);

    if(isset($_POST['SettingsRfxcomrx']))
    {
        $model->attributes=$_POST['SettingsRfxcomrx'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","rfxcomrx");
        }
    }
    $this->render('rfxcomrx',array('model'=>$model));
}

public function actionRfxcomtx()
{
    $model=SettingsRfxcomtx::model()->findByPk(1);

    if(isset($_POST['SettingsRfxcomtx']))
    {
        $model->attributes=$_POST['SettingsRfxcomtx'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","rfxcomtx");
        }
    }
    $this->render('rfxcomtx',array('model'=>$model));
}

public function actionRfxcomxpl()
{
    $model=SettingsRfxcomxpl::model()->findByPk(1);

    if(isset($_POST['SettingsRfxcomxpl']))
    {
        $model->attributes=$_POST['SettingsRfxcomxpl'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","rfxcomxpl");
        }
    }
    $this->render('rfxcomxpl',array('model'=>$model));
}

public function actionShell()
{
    $model=SettingsShell::model()->findByPk(1);

    if(isset($_POST['SettingsShell']))
    {
        $model->attributes=$_POST['SettingsShell'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","shell");
        }
    }
    $this->render('shell',array('model'=>$model));
}

public function actionUps()
{
    $model=SettingsUps::model()->findByPk(1);

    if(isset($_POST['SettingsUps']))
    {
        $model->attributes=$_POST['SettingsUps'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","ups");
        }
    }
    $this->render('ups',array('model'=>$model));
}

public function actionXpl()
{
    $model=SettingsXpl::model()->findByPk(1);

    if(isset($_POST['SettingsXpl']))
    {
        $model->attributes=$_POST['SettingsXpl'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","xpl");
        }
    }
    $this->render('xpl',array('model'=>$model));
}

public function actionPioneer()
{
    $model=SettingsPioneer::model()->findByPk(1);

    if(isset($_POST['SettingsPioneer']))
    {
        $model->attributes=$_POST['SettingsPioneer'];
        if($model->validate())
        {
           // form inputs are valid, do something here
           $model->save();
           $this->do_xmlrpc("module.restart","pioneer");
        }
    }
    $this->render('pioneer',array('model'=>$model));
}

protected function do_save($model) {

    if ( $model->save() === FALSE ) {
       Yii::app()->user->setFlash('error', "Saving settings... Failed!");
    } else {
       Yii::app()->user->setFlash('success', "Saving settings... Successful.");
    }
}

protected function do_xmlrpc($procedure, $data = array()) {

    $request = xmlrpc_encode_request($procedure, $data);
    $context = stream_context_create(array('http' => array('method' => "POST",'header' =>"Content-Type: text/xml",'content' => $request)));
    $file = @file_get_contents(Yii::app()->params['xmlrpcHost'], false, $context);
    if ( $file === FALSE ) {
       Yii::app()->user->setFlash('error', "Couldn't connect to XML-RPC service on '" . Yii::app()->params['xmlrpcHost'] . "'");
    } else {
       if ( xmlrpc_decode($file) == "1" ) {
          Yii::app()->user->setFlash('success', "Saving settings, restarting module '" . ucfirst($data) . "'... Successful.");
       } else {
          Yii::app()->user->setFlash('error', "Saving settings, restarting module '" . ucfirst($data) . "'... Failed!");
       }
    }
  }

}
