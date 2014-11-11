<?php

class SettingsController extends Controller {

    public function actionIndexModules() {

        $boolstring='';
        //FIXME : replace with db lookup for names
        $listModules = array();
        $listModules[] = 'astro';
        $listModules[] = 'bwiredmap';
        $listModules[] = 'callerid';
        $listModules[] = 'devicediscover';
        $listModules[] = 'email';
        $listModules[] = 'gmail';
        $listModules[] = 'jsonrpc';
        $listModules[] = 'main';
        $listModules[] = 'mqtt';
        $listModules[] = 'nma';
        $listModules[] = 'p2000';
        $listModules[] = 'xively';
        $listModules[] = 'prowl';
        $listModules[] = 'pushover';
        $listModules[] = 'pushbullet';
        $listModules[] = 'pvoutput';
        $listModules[] = 'serverstats';
        $listModules[] = 'smartvisuserver';
        $listModules[] = 'sound';
        $listModules[] = 'telnetserver';
        $listModules[] = 'temperaturnu';
        $listModules[] = 'thermostat';
        $listModules[] = 'tvguide';
        $listModules[] = 'twitter';
        $listModules[] = 'voicetext';
        $listModules[] = 'weatherug';
        $listModules[] = 'xmlrpc';

        //FIXME: perhaps use static arrays if dynamic listing of model *.php is a trouble 
        $pref = './protected/models/Settings';
        $rawData = array();
        $listTables = yii::app()->db->getSchema()->getTableNames();
        $filter = yii::app()->request->getParam('filter', 'Enabled');
        foreach (glob($pref . '*.php') as $filename) {
            $filename = str_replace($pref, "", $filename);
            $filename = str_replace(".php", "", $filename);
            $d1 = $filename;
            $modelName = 'Settings' . $filename;
            $model = $modelName::model();
            $modelAlias = $model->tableName();
            if (!in_array(strtolower($d1), $listModules))
                continue;
            if (isset($model) && !empty($model) && in_array($modelAlias, $listTables)) {
                $modelRecord = $model->findByPk(1);
                if ($model->hasAttribute('enabled')) {
                    if ($modelRecord->enabled !== "0")
                        $d2 = "Enabled";
                    else
                        $d2 = "Disabled";
                }
                else
                    $d2 = "-";
            } else {
                $d2 = "Error : Table not found ($modelAlias)";
                continue; //ignore when not finding table
            }
            $d3 = array();
            $values = $modelRecord->getAttributes();
            foreach (array_keys($values) as $l) {
                if ($l !== 'enabled' && $l !== 'id' && $l !== 'password' && $l !== 'debug')
                    $d3[] = "<b>$l</b>=" . $values[$l];
                if ($l == 'password')
                    $d3[] = "<b>$l</b>=" . "*****";
                if ($l == 'debug') {
                    $boolstring = ($values[$l]) ? 'true' : 'false';
                    $d3[] = "<b>$l</b>=" . $boolstring;
                }
            }

            $d3 = implode(', ', $d3);
            if ($filter != 'all' && $filter != $d2)
                continue;
            $d2 = yii::t('app', $d2);
            $line = array(
                "id" => $d1,
                "status" => $d2,
                "information" => $d3
            );

            $rawData[] = $line;
        }

        $arrayDataProvider = new CArrayDataProvider($rawData, array(
            'id' => 'id',
            'sort' => array(
                'attributes' => array(
                    'id'
                ),
            ),
            'pagination' => array(
                'pageSize' => 30,
            ),
        ));
        $this->render('indexModules', array('data' => $arrayDataProvider));
    }

    public function actionIndexPlugins() {

        $boolstring='';
        //FIXME : replace with db lookup for names
        $listPlugins = array();
        $listPlugins[] = 'asterisk';
        $listPlugins[] = 'bluetooth';
        $listPlugins[] = 'ctx35';
        $listPlugins[] = 'cul';
        $listPlugins[] = 'currentcost';
        $listPlugins[] = 'denon';
        $listPlugins[] = 'digitemp';
        $listPlugins[] = 'dmxplayer';
        $listPlugins[] = 'dsc';
        $listPlugins[] = 'ezcontrol';
        $listPlugins[] = 'fritzbox';
        $listPlugins[] = 'genericio';
        $listPlugins[] = 'gps';
        $listPlugins[] = 'hddtemp';
        $listPlugins[] = 'homematic';
        $listPlugins[] = 'iport';
        $listPlugins[] = 'irman';
        $listPlugins[] = 'irtrans';
        $listPlugins[] = 'iviewer';
        $listPlugins[] = 'jeelabs';
        $listPlugins[] = 'jerome';
        $listPlugins[] = 'k8055';
        $listPlugins[] = 'kmtronicudp';
        $listPlugins[] = 'knx';
        $listPlugins[] = 'ledmatrix';
        $listPlugins[] = 'lgtv';
        $listPlugins[] = 'lirc';
        $listPlugins[] = 'mochad';
        $listPlugins[] = 'ncid';
        $listPlugins[] = 'onkyo';
        $listPlugins[] = 'opentherm';
        $listPlugins[] = 'openzwave';
        $listPlugins[] = 'owfs';
        $listPlugins[] = 'oww';
        $listPlugins[] = 'philipshue';
        $listPlugins[] = 'ping';
        $listPlugins[] = 'pioneer';
        $listPlugins[] = 'plcbus';
        $listPlugins[] = 'plugwise';
        $listPlugins[] = 'pwrctrl';
        $listPlugins[] = 'razberry';
        $listPlugins[] = 'rfxcomrx';
        $listPlugins[] = 'rfxcomtrx';
        $listPlugins[] = 'rfxcomtx';
        $listPlugins[] = 'rfxcomxpl';
        $listPlugins[] = 'rrdtool';
        $listPlugins[] = 'sharptv';
        $listPlugins[] = 'shell';
        $listPlugins[] = 'smartmeter';
        $listPlugins[] = 'sms';
        $listPlugins[] = 'squeezeserver';
        $listPlugins[] = 'temp08';
        $listPlugins[] = 'toon';
        $listPlugins[] = 'ups';
        $listPlugins[] = 'velbus';
        $listPlugins[] = 'videoserver';
        $listPlugins[] = 'viera';
        $listPlugins[] = 'visca';
        $listPlugins[] = 'visonic';
        $listPlugins[] = 'weeder';
        $listPlugins[] = 'wiringpi';
        $listPlugins[] = 'x10cmd';
        $listPlugins[] = 'xpl';

        //FIXME: perhaps use static arrays if dynamic listing of model *.php is a trouble 
        $pref = './protected/models/Settings';
        $rawData = array();
        $listTables = yii::app()->db->getSchema()->getTableNames();
        $filter = yii::app()->request->getParam('filter', 'Enabled');
        foreach (glob($pref . '*.php') as $filename) {
            $filename = str_replace($pref, "", $filename);
            $filename = str_replace(".php", "", $filename);
            $d1 = $filename;
            $modelName = 'Settings' . $filename;
            $model = $modelName::model();
            $modelAlias = $model->tableName();
            if (!in_array(strtolower($d1), $listPlugins))
                continue;

            if (isset($model) && !empty($model) && in_array($modelAlias, $listTables)) {
                $modelRecord = $model->findByPk(1);
                if ($model->hasAttribute('enabled')) {
                    if ($modelRecord->enabled !== "0")
                        $d2 = "Enabled";
                    else
                        $d2 = "Disabled";
                }
                else
                    $d2 = "-";
            } else {
                $d2 = "Error : Table not found ($modelAlias)";
                continue; //ignore when not finding table
            }
            $d3 = array();
            $values = $modelRecord->getAttributes();
            foreach (array_keys($values) as $l) {
                if ($l !== 'enabled' && $l !== 'id' && $l !== 'password' && $l !== 'debug')
                    $d3[] = "<b>$l</b>=" . $values[$l];
                if ($l == 'password')
                    $d3[] = "<b>$l</b>=" . "*****";
                if ($l == 'debug') {
                    $boolstring = ($values[$l]) ? 'true' : 'false';
                    $d3[] = "<b>$l</b>=" . $boolstring;
                }
            }

            $d3 = implode(', ', $d3);
            if ($filter != 'all' && $filter != $d2)
                continue;
            $d2 = yii::t('app', $d2);
            $line = array(
                "id" => $d1,
                "status" => $d2,
                "information" => $d3
            );

            $rawData[] = $line;
        }

        $arrayDataProvider = new CArrayDataProvider($rawData, array(
            'id' => 'id',
            'sort' => array(
                'attributes' => array(
                    'id'
                ),
            ),
            'pagination' => array(
                'pageSize' => 30,
            ),
        ));
        $this->render('indexPlugins', array('data' => $arrayDataProvider));
    }

    public function actionJerome()
    {
        $model = SettingsJerome::model()->findByPk(1);

        if(isset($_POST['SettingsJerome']))
        {
            $model->attributes=$_POST['SettingsJerome'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                $this->do_save_restart($model, 'jerome');
            }
        }
        $this->render('jerome',array('model'=>$model));
    }

    public function actionVelbus() {
        $model = SettingsVelbus::model()->findByPk(1);

        if (isset($_POST['SettingsVelbus'])) {
            $model->attributes = $_POST['SettingsVelbus'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'velbus');
            }
        }
        $this->render('velbus', array('model' => $model));
    }

    public function actionViera() {
        $model = SettingsViera::model()->findByPk(1);

        if (isset($_POST['SettingsViera'])) {
            $model->attributes = $_POST['SettingsViera'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'viera');
            }
        }
        $this->render('viera', array('model' => $model));
    }

    public function actionToon() {
        $model = SettingsToon::model()->findByPk(1);

        if (isset($_POST['SettingsToon'])) {
            $model->attributes = $_POST['SettingsToon'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'toon');
            }
        }
        $this->render('toon', array('model' => $model));
    }

    public function actionJsonrpc() {
        $model = SettingsJsonrpc::model()->findByPk(1);

        if (isset($_POST['SettingsJsonrpc'])) {
            $model->attributes = $_POST['SettingsJsonrpc'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save($model);
            }
        }
        $this->render('jsonrpc', array('model' => $model));
    }

    public function actionP2000() {
        $model = SettingsP2000::model()->findByPk(1);

        if (isset($_POST['SettingsP2000'])) {
            $model->attributes = $_POST['SettingsP2000'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'P2000');
            }
        }
        $this->render('p2000', array('model' => $model));
    }

    public function actionRazberry() {
        $model = SettingsRazberry::model()->findByPk(1);

        if (isset($_POST['SettingsRazberry'])) {
            $model->attributes = $_POST['SettingsRazberry'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'razberry');
            }
        }
        $this->render('razberry', array('model' => $model));
    }

    public function actionGenericio() {
        $model = SettingsGenericio::model()->findByPk(1);

        if (isset($_POST['SettingsGenericio'])) {
            $model->attributes = $_POST['SettingsGenericio'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'genericio');
            }
        }
        $this->render('genericio', array('model' => $model));
    }

    public function actionWeatherug() {
        $model = SettingsWeatherug::model()->findByPk(1);

        if (isset($_POST['SettingsWeatherug'])) {
            $model->attributes = $_POST['SettingsWeatherug'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'weatherunderground');
            }
        }
        $this->render('weatherug', array('model' => $model));
    }

    public function actionNMA() {
        $model = SettingsNMA::model()->findByPk(1);

        if (isset($_POST['SettingsNMA'])) {
            $model->attributes = $_POST['SettingsNMA'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'nma');
            }
        }
        $this->render('nma', array('model' => $model));
    }

    public function actionPushover() {
        $model = SettingsPushover::model()->findByPk(1);

        if (isset($_POST['SettingsPushover'])) {
            $model->attributes = $_POST['SettingsPushover'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'pushover');
            }
        }
        $this->render('pushover', array('model' => $model));
    }

    public function actionProwl() {
        $model = SettingsProwl::model()->findByPk(1);

        if (isset($_POST['SettingsProwl'])) {
            $model->attributes = $_POST['SettingsProwl'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'prowl');
            }
        }
        $this->render('prowl', array('model' => $model));
    }

    public function actionKmtronicudp() {
        $model = SettingsKmtronicudp::model()->findByPk(1);

        if (isset($_POST['SettingsKmtronicudp'])) {
            $model->attributes = $_POST['SettingsKmtronicudp'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'kmtronicudp');
            }
        }
        $this->render('kmtronicudp', array('model' => $model));
    }

    public function actionVisonic() {
        $model = SettingsVisonic::model()->findByPk(1);

        if (isset($_POST['SettingsVisonic'])) {
            $model->attributes = $_POST['SettingsVisonic'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'visonic');
            }
        }
        $this->render('visonic', array('model' => $model));
    }

    public function actionPvoutput() {
        $model = SettingsPvoutput::model()->findByPk(1);

        if (isset($_POST['SettingsPvoutput'])) {
            $model->attributes = $_POST['SettingsPvoutput'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'pvoutput');
            }
        }
        $this->render('pvoutput', array('model' => $model));
    }

    public function actionMqtt() {
        $model = SettingsMqtt::model()->findByPk(1);

        if (isset($_POST['SettingsMqtt'])) {
            $model->attributes = $_POST['SettingsMqtt'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'mqtt');
            }
        }
        $this->render('mqtt', array('model' => $model));
    }

    public function actionMochad() {
        $model = SettingsMochad::model()->findByPk(1);

        if (isset($_POST['SettingsMochad'])) {
            $model->attributes = $_POST['SettingsMochad'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'mochad');
            }
        }
        $this->render('mochad', array('model' => $model));
    }

    public function actionSmartvisuserver() {
        $model = SettingsSmartvisuserver::model()->findByPk(1);

        if (isset($_POST['SettingsSmartvisuserver'])) {
            $model->attributes = $_POST['SettingsSmartvisuserver'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'smartvisuserver');
            }
        }
        $this->render('smartvisuserver', array('model' => $model));
    }

    public function actionFritzbox() {
        $model = SettingsFritzbox::model()->findByPk(1);

        if (isset($_POST['SettingsFritzbox'])) {
            $model->attributes = $_POST['SettingsFritzbox'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'fritzbox');
            }
        }
        $this->render('fritzbox', array('model' => $model));
    }

    public function actionRfxcomtrx() {
        $model = SettingsRfxcomtrx::model()->findByPk(1);

        if (isset($_POST['SettingsRfxcomtrx'])) {
            $model->attributes = $_POST['SettingsRfxcomtrx'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'rfxcomtrx');
            }
        }
        $this->render('rfxcomtrx', array('model' => $model));
    }

    public function actionAsterisk() {
        $model = SettingsAsterisk::model()->findByPk(1);

        if (isset($_POST['SettingsAsterisk'])) {
            $model->attributes = $_POST['SettingsAsterisk'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'asterisk');
            }
        }
        $this->render('asterisk', array('model' => $model));
    }

    public function actionMain() {
        $model = SettingsMain::model()->findByPk(1);

        if (isset($_POST['SettingsMain'])) {
            $model->attributes = $_POST['SettingsMain'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'main');
            }
        }
        $this->render('main', array('model' => $model));
    }

    public function actionCallerid() {
        $model = SettingsCallerid::model()->findByPk(1);

        if (isset($_POST['SettingsCallerid'])) {
            $model->attributes = $_POST['SettingsCallerid'];
            if ($model->validate()) {
                // form inputs are valid, save
                $this->do_save($model);
            }
        }
        $this->render('callerid', array('model' => $model));
    }

    public function actionDevicediscover() {
        $model = SettingsDevicediscover::model()->findByPk(1);

        if (isset($_POST['SettingsDevicediscover'])) {
            $model->attributes = $_POST['SettingsDevicediscover'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save($model);
                $this->do_restart('devicediscover');
            }
        }
        $this->render('devicediscover', array('model' => $model));
    }

    public function actionAstro() {
        $model = SettingsAstro::model()->findByPk(1);

        if (isset($_POST['SettingsAstro'])) {
            $model->attributes = $_POST['SettingsAstro'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'astro');
            }
        }
        $this->render('astro', array('model' => $model));
    }

    public function actionEmail() {
        $model = SettingsEmail::model()->findByPk(1);

        if (isset($_POST['SettingsEmail'])) {
            $model->attributes = $_POST['SettingsEmail'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'email');
            }
        }
        $this->render('email', array('model' => $model));
    }

    public function actionGmail() {
        $model = SettingsGmail::model()->findByPk(1);

        if (isset($_POST['SettingsGmail'])) {
            $model->attributes = $_POST['SettingsGmail'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'gmail');
            }
        }
        $this->render('gmail', array('model' => $model));
    }

    public function actionTwitter() {
        $model = SettingsTwitter::model()->findByPk(1);

        if (isset($_POST['SettingsTwitter'])) {
            $model->attributes = $_POST['SettingsTwitter'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'twitter');
            }
        }
        $this->render('twitter', array('model' => $model));
    }

    public function actionSound() {
        $model = SettingsSound::model()->findByPk(1);

        if (isset($_POST['SettingsSound'])) {
            $model->attributes = $_POST['SettingsSound'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'sound');
            }
        }
        $this->render('sound', array('model' => $model));
    }

    public function actionVoicetext() {
        $model = SettingsVoicetext::model()->findByPk(1);

        if (isset($_POST['SettingsVoicetext'])) {
            $model->attributes = $_POST['SettingsVoicetext'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'voicetext');
            }
        }
        $this->render('voicetext', array('model' => $model));
    }

    public function actionTelnetserver() {
        $model = SettingsTelnetserver::model()->findByPk(1);

        if (isset($_POST['SettingsTelnetserver'])) {
            $model->attributes = $_POST['SettingsTelnetserver'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'telnetserver');
            }
        }
        $this->render('telnetserver', array('model' => $model));
    }


    public function actionServerstats() {
        $model = SettingsServerstats::model()->findByPk(1);

        if (isset($_POST['SettingsServerstats'])) {
            $model->attributes = $_POST['SettingsServerstats'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'serverstats');
            }
        }
        $this->render('serverstats', array('model' => $model));
    }

    public function actionTvguide() {
        $model = SettingsTvguide::model()->findByPk(1);

        if (isset($_POST['SettingsTvguide'])) {
            $model->attributes = $_POST['SettingsTvguide'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'tvguide');
            }
        }
        $this->render('tvguide', array('model' => $model));
    }

    public function actionXmlrpc() {
        $model = SettingsXmlrpc::model()->findByPk(1);

        if (isset($_POST['SettingsXmlrpc'])) {
            $model->attributes = $_POST['SettingsXmlrpc'];
            if ($model->validate()) {
                // form inputs are valid, save data
                $this->do_save($model);
            }
        }
        $this->render('xmlrpc', array('model' => $model));
    }

    public function actionThermostat() {
        $model = SettingsThermostat::model()->findByPk(1);

        if (isset($_POST['SettingsThermostat'])) {
            $model->attributes = $_POST['SettingsThermostat'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'thermostat');
            }
        }
        $this->render('thermostat', array('model' => $model));
    }

    public function actionBwiredmap() {
        $model = SettingsBwiredmap::model()->findByPk(1);

        if (isset($_POST['SettingsBwiredmap'])) {
            $model->attributes = $_POST['SettingsBwiredmap'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'bwiredmap');
            }
        }
        $this->render('bwiredmap', array('model' => $model));
    }

    public function actionXively() {
        $model = SettingsXively::model()->findByPk(1);

        if (isset($_POST['SettingsXively'])) {
            $model->attributes = $_POST['SettingsXively'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'xively');
            }
        }
        $this->render('xively', array('model' => $model));
    }

    public function actionPhilipshue() {
        $model = SettingsPhilipshue::model()->findByPk(1);

        if (isset($_POST['SettingsPhilipshue'])) {
            $model->attributes = $_POST['SettingsPhilipshue'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $model->save();
                $this->do_restart('philipshue');
            }
        }
        $this->render('philipshue', array('model' => $model));
    }

    public function actionTemperaturnu() {
        $model = SettingsTemperaturnu::model()->findByPk(1);

        if (isset($_POST['SettingsTemperaturnu'])) {
            $model->attributes = $_POST['SettingsTemperaturnu'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'temperaturnu');
            }
        }
        $this->render('temperaturnu', array('model' => $model));
    }

    public function actionDigitemp() {
        $model = SettingsDigitemp::model()->findByPk(1);

        if (isset($_POST['SettingsDigitemp'])) {
            $model->attributes = $_POST['SettingsDigitemp'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'digitemp');
            }
        }
        $this->render('digitemp', array('model' => $model));
    }

    public function actionTemp08() {
        $model = SettingsTemp08::model()->findByPk(1);

        if (isset($_POST['SettingsTemp08'])) {
            $model->attributes = $_POST['SettingsTemp08'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'temp08');
            }
        }
        $this->render('temp08', array('model' => $model));
    }

    public function actionOwfs() {
        $model = SettingsOwfs::model()->findByPk(1);

        if (isset($_POST['SettingsOwfs'])) {
            $model->attributes = $_POST['SettingsOwfs'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'owfs');
            }
        }
        $this->render('owfs', array('model' => $model));
    }

    public function actionOww() {
        $model = SettingsOww::model()->findByPk(1);

        if (isset($_POST['SettingsOww'])) {
            $model->attributes = $_POST['SettingsOww'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'oww');
            }
        }
        $this->render('oww', array('model' => $model));
    }

    public function actionDenon() {
        $model = SettingsDenon::model()->findByPk(1);

        if (isset($_POST['SettingsDenon'])) {
            $model->attributes = $_POST['SettingsDenon'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'denon');
            }
        }
        $this->render('denon', array('model' => $model));
    }

    public function actionIport() {
        $model = SettingsIport::model()->findByPk(1);

        if (isset($_POST['SettingsIport'])) {
            $model->attributes = $_POST['SettingsIport'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'iport');
            }
        }
        $this->render('iport', array('model' => $model));
    }

    public function actionLgtv() {
        $model = SettingsLgtv::model()->findByPk(1);

        if (isset($_POST['SettingsLgtv'])) {
            $model->attributes = $_POST['SettingsLgtv'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'lgtv');
            }
        }
        $this->render('lgtv', array('model' => $model));
    }

    public function actionOnkyo() {
        $model = SettingsOnkyo::model()->findByPk(1);

        if (isset($_POST['SettingsOnkyo'])) {
            $model->attributes = $_POST['SettingsOnkyo'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'onkyo');
            }
        }
        $this->render('onkyo', array('model' => $model));
    }

    public function actionSharptv() {
        $model = SettingsSharptv::model()->findByPk(1);

        if (isset($_POST['SettingsSharptv'])) {
            $model->attributes = $_POST['SettingsSharptv'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'sharptv');
            }
        }
        $this->render('sharptv', array('model' => $model));
    }

    public function actionSqueezeserver() {
        $model = SettingsSqueezeserver::model()->findByPk(1);

        if (isset($_POST['SettingsSqueezeserver'])) {
            $model->attributes = $_POST['SettingsSqueezeserver'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'squeezeserver');
            }
        }
        $this->render('squeezeserver', array('model' => $model));
    }

    public function actionNcid() {
        $model = SettingsNcid::model()->findByPk(1);

        if (isset($_POST['SettingsNcid'])) {
            $model->attributes = $_POST['SettingsNcid'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'ncid');
            }
        }
        $this->render('ncid', array('model' => $model));
    }

    public function actionCul() {
        $model = SettingsCul::model()->findByPk(1);

        if (isset($_POST['SettingsCul'])) {
            $model->attributes = $_POST['SettingsCul'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'cul');
            }
        }
        $this->render('cul', array('model' => $model));
    }

    public function actionVideoserver() {
        $model = SettingsVideoserver::model()->findByPk(1);

        if (isset($_POST['SettingsVideoserver'])) {
            $model->attributes = $_POST['SettingsVideoserver'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'videoserver');
            }
        }
        $this->render('videoserver', array('model' => $model));
    }

    public function actionVisca() {
        $model = SettingsVisca::model()->findByPk(1);

        if (isset($_POST['SettingsVisca'])) {
            $model->attributes = $_POST['SettingsVisca'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'visca');
            }
        }
        $this->render('visca', array('model' => $model));
    }

    public function actionPwrctrl() {
        $model = SettingsPwrctrl::model()->findByPk(1);

        if (isset($_POST['SettingsPwrctrl'])) {
            $model->attributes = $_POST['SettingsPwrctrl'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'pwrctrl');
            }
        }
        $this->render('pwrctrl', array('model' => $model));
    }

    public function actionEzcontrol() {
        $model = SettingsEzcontrol::model()->findByPk(1);

        if (isset($_POST['SettingsEzcontrol'])) {
            $model->attributes = $_POST['SettingsEzcontrol'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'ezcontrol');
            }
        }
        $this->render('ezcontrol', array('model' => $model));
    }

    public function actionKnx() {
        $model = SettingsKnx::model()->findByPk(1);

        if (isset($_POST['SettingsKnx'])) {
            $model->attributes = $_POST['SettingsKnx'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'knx');
            }
        }
        $this->render('knx', array('model' => $model));
    }

    public function actionPlcbus() {
        $model = SettingsPlcbus::model()->findByPk(1);

        if (isset($_POST['SettingsPlcbus'])) {
            $model->attributes = $_POST['SettingsPlcbus'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'plcbus');
            }
        }
        $this->render('plcbus', array('model' => $model));
    }

    public function actionX10cmd() {
        $model = SettingsX10cmd::model()->findByPk(1);

        if (isset($_POST['SettingsX10cmd'])) {
            $model->attributes = $_POST['SettingsX10cmd'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'x10cmd');
            }
        }
        $this->render('x10cmd', array('model' => $model));
    }

    public function actionCtx35() {
        $model = SettingsCtx35::model()->findByPk(1);

        if (isset($_POST['SettingsCtx35'])) {
            $model->attributes = $_POST['SettingsCtx35'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'ctx35');
            }
        }
        $this->render('ctx35', array('model' => $model));
    }

    public function actionOpenzwave() {
        $model = SettingsOpenzwave::model()->findByPk(1);

        if (isset($_POST['SettingsOpenzwave'])) {
            $model->attributes = $_POST['SettingsOpenzwave'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'openzwave');
            }
        }
        $this->render('openzwave', array('model' => $model));
    }

    public function actionDsc() {
        $model = SettingsDsc::model()->findByPk(1);

        if (isset($_POST['SettingsDsc'])) {
            $model->attributes = $_POST['SettingsDsc'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'dsc');
            }
        }
        $this->render('dsc', array('model' => $model));
    }

    public function actionCurrentcost() {
        $model = SettingsCurrentcost::model()->findByPk(1);

        if (isset($_POST['SettingsCurrentcost'])) {
            $model->attributes = $_POST['SettingsCurrentcost'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'currentcost');
            }
        }
        $this->render('currentcost', array('model' => $model));
    }

    public function actionPlugwise() {
        $model = SettingsPlugwise::model()->findByPk(1);

        if (isset($_POST['SettingsPlugwise'])) {
            $model->attributes = $_POST['SettingsPlugwise'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'plugwise');
            }
        }
        $this->render('plugwise', array('model' => $model));
    }

    public function actionSmartmeter() {
        $model = SettingsSmartmeter::model()->findByPk(1);

        if (isset($_POST['SettingsSmartmeter'])) {
            $model->attributes = $_POST['SettingsSmartmeter'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'smartmeter');
            }
        }
        $this->render('smartmeter', array('model' => $model));
    }

    public function actionHddtemp() {
        $model = SettingsHddtemp::model()->findByPk(1);

        if (isset($_POST['SettingsHddtemp'])) {
            $model->attributes = $_POST['SettingsHddtemp'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'hddtemp');
            }
        }
        $this->render('hddtemp', array('model' => $model));
    }

    public function actionHomematic() {
        $model = SettingsHomematic::model()->findByPk(1);

        if (isset($_POST['SettingsHomematic'])) {
            $model->attributes = $_POST['SettingsHomematic'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'homematic');
            }
        }
        $this->render('homematic', array('model' => $model));
    }

    public function actionK8055() {
        $model = SettingsK8055::model()->findByPk(1);

        if (isset($_POST['SettingsK8055'])) {
            $model->attributes = $_POST['SettingsK8055'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'k8055');
            }
        }
        $this->render('k8055', array('model' => $model));
    }

    public function actionWeeder() {
        $model = SettingsWeeder::model()->findByPk(1);

        if (isset($_POST['SettingsWeeder'])) {
            $model->attributes = $_POST['SettingsWeeder'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'weeder');
            }
        }
        $this->render('weeder', array('model' => $model));
    }

    public function actionIviewer() {
        $model = SettingsIviewer::model()->findByPk(1);

        if (isset($_POST['SettingsIviewer'])) {
            $model->attributes = $_POST['SettingsIviewer'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'iviewer');
            }
        }
        $this->render('iviewer', array('model' => $model));
    }

    public function actionIrman() {
        $model = SettingsIrman::model()->findByPk(1);

        if (isset($_POST['SettingsIrman'])) {
            $model->attributes = $_POST['SettingsIrman'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'irman');
            }
        }
        $this->render('irman', array('model' => $model));
    }

    public function actionIrtrans() {
        $model = SettingsIrtrans::model()->findByPk(1);

        if (isset($_POST['SettingsIrtrans'])) {
            $model->attributes = $_POST['SettingsIrtrans'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'irtrans');
            }
        }
        $this->render('irtrans', array('model' => $model));
    }

    public function actionLirc() {
        $model = SettingsLirc::model()->findByPk(1);

        if (isset($_POST['SettingsLirc'])) {
            $model->attributes = $_POST['SettingsLirc'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'lirc');
            }
        }
        $this->render('lirc', array('model' => $model));
    }

    public function actionDmxPlayer() {
        $model = SettingsDmxPlayer::model()->findByPk(1);

        if (isset($_POST['SettingsDmxPlayer'])) {
            $model->attributes = $_POST['SettingsDmxPlayer'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'dmxplayer');
            }
        }
        $this->render('dmxplayer', array('model' => $model));
    }

    public function actionJeelabs() {
        $model = SettingsJeelabs::model()->findByPk(1);

        if (isset($_POST['SettingsJeelabs'])) {
            $model->attributes = $_POST['SettingsJeelabs'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'jeelabs');
            }
        }
        $this->render('jeelabs', array('model' => $model));
    }

    public function actionLedmatrix() {
        $model = SettingsLedmatrix::model()->findByPk(1);

        if (isset($_POST['SettingsLedmatrix'])) {
            $model->attributes = $_POST['SettingsLedmatrix'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'ledmatrix');
            }
        }
        $this->render('ledmatrix', array('model' => $model));
    }

    public function actionBluetooth() {
        $model = SettingsBluetooth::model()->findByPk(1);

        if (isset($_POST['SettingsBluetooth'])) {
            $model->attributes = $_POST['SettingsBluetooth'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'bluetooth');
            }
        }
        $this->render('bluetooth', array('model' => $model));
    }

    public function actionSms() {
        $model = SettingsSms::model()->findByPk(1);

        if (isset($_POST['SettingsSms'])) {
            $model->attributes = $_POST['SettingsSms'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'sms');
            }
        }
        $this->render('sms', array('model' => $model));
    }

    public function actionPing() {
        $model = SettingsPing::model()->findByPk(1);

        if (isset($_POST['SettingsPing'])) {
            $model->attributes = $_POST['SettingsPing'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'ping');
            }
        }
        $this->render('ping', array('model' => $model));
    }

    public function actionGps() {
        $model = SettingsGps::model()->findByPk(1);

        if (isset($_POST['SettingsGps'])) {
            $model->attributes = $_POST['SettingsGps'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'gps');
            }
        }
        $this->render('gps', array('model' => $model));
    }

    public function actionOpentherm() {
        $model = SettingsOpentherm::model()->findByPk(1);

        if (isset($_POST['SettingsOpentherm'])) {
            $model->attributes = $_POST['SettingsOpentherm'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'opentherm');
            }
        }
        $this->render('opentherm', array('model' => $model));
    }

    public function actionRrdtool() {
        $model = SettingsRrdtool::model()->findByPk(1);

        if (isset($_POST['SettingsRrdtool'])) {
            $model->attributes = $_POST['SettingsRrdtool'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'rrdtool');
            }
        }
        $this->render('rrdtool', array('model' => $model));
    }

    public function actionRfxcomrx() {
        $model = SettingsRfxcomrx::model()->findByPk(1);

        if (isset($_POST['SettingsRfxcomrx'])) {
            $model->attributes = $_POST['SettingsRfxcomrx'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'rfxcomrx');
            }
        }
        $this->render('rfxcomrx', array('model' => $model));
    }

    public function actionRfxcomtx() {
        $model = SettingsRfxcomtx::model()->findByPk(1);

        if (isset($_POST['SettingsRfxcomtx'])) {
            $model->attributes = $_POST['SettingsRfxcomtx'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'rfxcomtx');
            }
        }
        $this->render('rfxcomtx', array('model' => $model));
    }

    public function actionRfxcomxpl() {
        $model = SettingsRfxcomxpl::model()->findByPk(1);

        if (isset($_POST['SettingsRfxcomxpl'])) {
            $model->attributes = $_POST['SettingsRfxcomxpl'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'rfxcomxpl');
            }
        }
        $this->render('rfxcomxpl', array('model' => $model));
    }

    public function actionShell() {
        $model = SettingsShell::model()->findByPk(1);

        if (isset($_POST['SettingsShell'])) {
            $model->attributes = $_POST['SettingsShell'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'shell');
            }
        }
        $this->render('shell', array('model' => $model));
    }

    public function actionUps() {
        $model = SettingsUps::model()->findByPk(1);

        if (isset($_POST['SettingsUps'])) {
            $model->attributes = $_POST['SettingsUps'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'ups');
            }
        }
        $this->render('ups', array('model' => $model));
    }

    public function actionXpl() {
        $model = SettingsXpl::model()->findByPk(1);

        if (isset($_POST['SettingsXpl'])) {
            $model->attributes = $_POST['SettingsXpl'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'xpl');
            }
        }
        $this->render('xpl', array('model' => $model));
    }

    public function actionPioneer() {
        $model = SettingsPioneer::model()->findByPk(1);

        if (isset($_POST['SettingsPioneer'])) {
            $model->attributes = $_POST['SettingsPioneer'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save_restart($model, 'pioneer');
            }
        }
        $this->render('pioneer', array('model' => $model));
    }

    public function actionWiringpi()
    {
        $model = SettingsWiringpi::model()->findByPk(1);

        if(isset($_POST['SettingsWiringpi']))
        {
            $model->attributes=$_POST['SettingsWiringpi'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                $this->do_save_restart($model,'wiringpi');
            }
        }
        $this->render('wiringpi',array('model'=>$model));
    }

    public function actionPushbullet()
    {
        $model = SettingsPushbullet::model()->findByPk(1);

        if(isset($_POST['SettingsPushbullet']))
        {
            $model->attributes=$_POST['SettingsPushbullet'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                $this->do_save_restart($model,'pushbullet');
            }
        }
        $this->render('pushbullet',array('model'=>$model));
    }

    public function actionOpenweathermap()
    {
        $model = SettingsOpenweathermap::model()->findByPk(1);

        if(isset($_POST['SettingsOpenweathermap']))
        {
            $model->attributes=$_POST['SettingsOpenweathermap'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                $this->do_save_restart($model,'openweathermap');
            }
        }
        $this->render('openweathermap',array('model'=>$model));
    }

    public function actionForecastio()
    {
        $model = SettingsForecastio::model()->findByPk(1);

        if(isset($_POST['SettingsForecastio']))
        {
            $model->attributes=$_POST['SettingsForecastio'];
            if($model->validate())
            {
                // form inputs are valid, do something here
                $this->do_save_restart($model,'forecastio');
            }
        }
        $this->render('forecastio',array('model'=>$model));
    }

    public function actionSendTestNMA() {
        $res = doJsonRpc(array('jsonrpc' => '2.0', 'method' => 'nma.send', 'params' => array('msg' => 'This is a test Msg!'), 'id' => 1));
        if ($res) {
            if (isset($res->result) && $res->result) {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test pushmsg.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test pushmsg failed!'));
            }
        }
        $this->redirect('nma', true);
    }

    public function actionSendTestProwl() {
        $res = doJsonRpc(array('jsonrpc' => '2.0', 'method' => 'prowl.send', 'params' => array('msg' => 'This is a test Msg!'), 'id' => 1));
        if ($res) {
            if (isset($res->result) && $res->result) {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test pushmsg.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test pushmsg failed!'));
            }
        }
        $this->redirect('prowl', true);
    }

    public function actionSendTestPushover() {
        $res = doJsonRpc(array('jsonrpc' => '2.0', 'method' => 'pushover.send', 'params' => array('msg' => 'This is a test Msg!'), 'id' => 1));
        if ($res) {
            if (isset($res->result) && $res->result) {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test pushmsg.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test pushmsg failed!'));
            }
        }
        $this->redirect('pushover', true);
    }

    public function actionSendTestPushbullet() {
        $res = doJsonRpc(array('jsonrpc' => '2.0', 'method' => 'pushbullet.send', 'params' => array('msg' => 'This is a test Msg!'), 'id' => 1));
        if ($res) {
            if (isset($res->result) && $res->result) {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test pushmsg.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test pushmsg failed!'));
            }
        }
        $this->redirect('pushover', true);
    }

    public function actionSendTestTweet() {
        $res = doJsonRpc(array('jsonrpc' => '2.0', 'method' => 'twitter.send', 'params' => array('msg' => 'This is a test Tweet!'), 'id' => 1));
        if ($res) {
            if (isset($res->result) && $res->result) {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test tweet.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test tweet failed!'));
            }
        }
        $this->redirect('twitter', true);
    }

    public function actionSendTestEmail() {
        $res = doJsonRpc(array('jsonrpc' => '2.0', 'method' => 'email.send', 'params' => array('msg' => 'If you read this, e-mail support is working!',
                'subject' => 'Test e-mail'), 'id' => 1));
        if ($res) {
            if (isset($res->result) && $res->result) {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test e-mail.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test e-mail failed!'));
            }
        }
        $this->redirect('email', true);
    }

    protected function do_save($model) {
        if (!$model->save()) {
            Yii::app()->user->setFlash('error', Yii::t('app', 'Saving settings failed!'));
        } else {
            Yii::app()->user->setFlash('success', Yii::t('app', 'Settings saved.'));
        }
    }

    protected function do_save_restart($model, $plugin) {
        $save_res = $model->save();
        $json_res = doJsonRpc(array('jsonrpc' => '2.0', 'method' => 'plugin.restart', 'params' => array('name' => $plugin), 'id' => 1));

        if ($save_res && $json_res->result) {
            Yii::app()->user->setFlash('success', Yii::t('app', 'Saved settings, module restarted.'));
	} else if ($save_res && !$json_res->result) {
            Yii::app()->user->setFlash('error', Yii::t('app', 'Settings saved, module restart failed!'));
	} else if (!$save_res && $json_res->result) {
            Yii::app()->user->setFlash('error', Yii::t('app', 'Saving settings failed, module restarted!'));
        }
    }
}
