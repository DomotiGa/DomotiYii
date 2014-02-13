<?php

class SettingsController extends Controller {

    public function actionIndex() {
        //FIXME: [PATOCHE] perhaps use static arrays if dynamic listing of model *.php is a trouble 
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
            //FIXME: [PATOCHE] add too much attributes ?? should choose a list of attributes to check
            $values = $modelRecord->getAttributes();
            foreach (array_keys($values) as $l) {
                if ($l !== 'enabled' && $l !== 'id')
                    $d3[] = "<b>$l</b>=" . $values[$l];
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
        $this->render('index', array('data' => $arrayDataProvider));
    }

    public function actionVelbus() {
        $model = SettingsVelbus::model()->findByPk(1);

        if (isset($_POST['SettingsVelbus'])) {
            $model->attributes = $_POST['SettingsVelbus'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save($model);
                $this->do_restart('velbus');
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
                $this->do_save($model);
                $this->do_restart('viera');
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
                $this->do_save($model);
                $this->do_restart('toon');
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
                $model->save();
                $this->do_restart('P2000');
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
                $model->save();
                $this->do_restart('razberry');
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
                $model->save();
                $this->do_restart('genericio');
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
                $model->save();
                $this->do_restart('weatherug');
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
                $model->save();
                $this->do_restart('NMA');
            }
        }
        $this->render('NMA', array('model' => $model));
    }

    public function actionPushover() {
        $model = SettingsPushover::model()->findByPk(1);

        if (isset($_POST['SettingsPushover'])) {
            $model->attributes = $_POST['SettingsPushover'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $model->save();
                $this->do_restart('pushover');
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
                $model->save();
                $this->do_restart('prowl');
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
                $model->save();
                $this->do_restart('kmtronicudp');
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
                $model->save();
                $this->do_restart('visonic');
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
                $model->save();
                $this->do_restart('pvoutput');
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
                $model->save();
                $this->do_restart('mqtt');
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
                $model->save();
                $this->do_restart('mochad');
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
                $model->save();
                $this->do_restart('smartvisuserver');
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
                $model->save();
                $this->do_restart('fritzbox');
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
                $model->save();
                $this->do_restart('rfxcomtrx');
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
                $model->save();
                $this->do_restart('asterisk');
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
                $this->do_save($model);
                $this->do_restart('main');
            }
        }
        $this->render('main', array('model' => $model));
    }

    public function actionCallerid() {
        $model = SettingsCallerid::model()->findByPk(1);

        if (isset($_POST['SettingsCallerid'])) {
            $model->attributes = $_POST['SettingsCallerid'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $this->do_save($model);
            }
        }
        $this->render('callerid', array('model' => $model));
    }

    public function actionAstro() {
        $model = SettingsAstro::model()->findByPk(1);

        if (isset($_POST['SettingsAstro'])) {
            $model->attributes = $_POST['SettingsAstro'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $model->save();
                $this->do_restart('astro');
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
                $model->save();
                $this->do_restart('email');
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
                $model->save();
                $this->do_restart('gmail');
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
                $model->save();
                $this->do_restart('twitter');
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
                $model->save();
                $this->do_restart('sound');
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
                $model->save();
                $this->do_restart('voicetext');
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
                $model->save();
                $this->do_restart('telnetserver');
            }
        }
        $this->render('telnetserver', array('model' => $model));
    }

    public function actionWeatherbug() {
        $model = SettingsWeatherbug::model()->findByPk(1);

        if (isset($_POST['SettingsWeatherbug'])) {
            $model->attributes = $_POST['SettingsWeatherbug'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $model->save();
                $this->do_restart('weatherbug');
            }
        }
        $this->render('weatherbug', array('model' => $model));
    }

    public function actionServerstats() {
        $model = SettingsServerstats::model()->findByPk(1);

        if (isset($_POST['SettingsServerstats'])) {
            $model->attributes = $_POST['SettingsServerstats'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $model->save();
                $this->do_restart('serverstats');
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
                $model->save();
                $this->do_restart('tvguide');
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
                $model->save();
                $this->do_restart('thermostat');
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
                $model->save();
                $this->do_restart('bwiredmap');
            }
        }
        $this->render('bwiredmap', array('model' => $model));
    }

    public function actionPachube() {
        $model = SettingsPachube::model()->findByPk(1);

        if (isset($_POST['SettingsPachube'])) {
            $model->attributes = $_POST['SettingsPachube'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $model->save();
                $this->do_restart('pachube');
            }
        }
        $this->render('pachube', array('model' => $model));
    }

    public function actionTemperaturnu() {
        $model = SettingsTemperaturnu::model()->findByPk(1);

        if (isset($_POST['SettingsTemperaturnu'])) {
            $model->attributes = $_POST['SettingsTemperaturnu'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $model->save();
                $this->do_restart('temperaturnu');
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
                $model->save();
                $this->do_restart('digitemp');
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
                $model->save();
                $this->do_restart('temp08');
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
                $model->save();
                $this->do_restart('owfs');
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
                $model->save();
                $this->do_restart('oww');
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
                $model->save();
                $this->do_restart('denon');
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
                $model->save();
                $this->do_restart('iport');
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
                $model->save();
                $this->do_restart('lgtv');
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
                $model->save();
                $this->do_restart('onkyo');
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
                $model->save();
                $this->do_restart('sharptv');
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
                $model->save();
                $this->do_restart('squeezeserver');
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
                $model->save();
                $this->do_restart('ncid');
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
                $model->save();
                $this->do_restart('cul');
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
                $model->save();
                $this->do_restart('videoserver');
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
                $model->save();
                $this->do_restart('visca');
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
                $model->save();
                $this->do_restart('pwrctrl');
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
                $model->save();
                $this->do_restart('ezcontrol');
            }
        }
        $this->render('ezcontrol', array('model' => $model));
    }

    public function actionEib() {
        $model = SettingsEib::model()->findByPk(1);

        if (isset($_POST['SettingsEib'])) {
            $model->attributes = $_POST['SettingsEib'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $model->save();
                $this->do_restart('eib');
            }
        }
        $this->render('eib', array('model' => $model));
    }

    public function actionPlcbus() {
        $model = SettingsPlcbus::model()->findByPk(1);

        if (isset($_POST['SettingsPlcbus'])) {
            $model->attributes = $_POST['SettingsPlcbus'];
            if ($model->validate()) {
                // form inputs are valid, save and restart
                $model->save();
                $this->do_restart('plcbus');
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
                $model->save();
                $this->do_restart('x10cmd');
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
                $model->save();
                $this->do_restart('ctx35');
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
                $model->save();
                $this->do_restart('openzwave');
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
                $model->save();
                $this->do_restart('dsc');
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
                $model->save();
                $this->do_restart('currentcost');
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
                $model->save();
                $this->do_restart('plugwise');
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
                $model->save();
                $this->do_restart('smartmeter');
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
                $model->save();
                $this->do_restart('hddtemp');
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
                $model->save();
                $this->do_restart('homematic');
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
                $model->save();
                $this->do_restart('k8055');
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
                $model->save();
                $this->do_restart('weeder');
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
                $model->save();
                $this->do_restart('iviewer');
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
                $model->save();
                $this->do_restart('irman');
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
                $model->save();
                $this->do_restart('irtrans');
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
                $model->save();
                $this->do_restart('lirc');
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
                $model->save();
                $this->do_restart('dmxplayer');
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
                $model->save();
                $this->do_restart('jeelabs');
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
                $model->save();
                $this->do_restart('ledmatrix');
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
                $model->save();
                $this->do_restart('bluetooth');
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
                $model->save();
                $this->do_restart('sms');
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
                $model->save();
                $this->do_restart('ping');
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
                $model->save();
                $this->do_restart('gps');
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
                $model->save();
                $this->do_restart('opentherm');
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
                $model->save();
                $this->do_restart('rrdtool');
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
                $model->save();
                $this->do_restart('rfxcomrx');
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
                $model->save();
                $this->do_restart('rfxcomtx');
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
                $model->save();
                $this->do_restart('rfxcomxpl');
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
                $model->save();
                $this->do_restart('shell');
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
                $model->save();
                $this->do_restart('ups');
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
                $model->save();
                $this->do_restart('xpl');
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
                $model->save();
                $this->do_restart('pioneer');
            }
        }
        $this->render('pioneer', array('model' => $model));
    }

    public function actionSendTestNMA() {
        $res = $this->do_jsonrpc(array('jsonrpc' => '2.0', 'method' => 'nma.send', 'params' => array('msg' => 'This is a test Msg!'), 'id' => 1));
        if ($res) {
            if ($res->result == "1") {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test pushmsg.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test pushmsg failed!'));
            }
        }
        $this->redirect('NMA', true);
    }

    public function actionSendTestProwl() {
        $res = $this->do_jsonrpc(array('jsonrpc' => '2.0', 'method' => 'prowl.send', 'params' => array('msg' => 'This is a test Msg!'), 'id' => 1));
        if ($res) {
            if ($res->result == "1") {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test pushmsg.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test pushmsg failed!'));
            }
        }
        $this->redirect('prowl', true);
    }

    public function actionSendTestPushover() {
        $res = $this->do_jsonrpc(array('jsonrpc' => '2.0', 'method' => 'pushover.send', 'params' => array('msg' => 'This is a test Msg!'), 'id' => 1));
        if ($res) {
            if ($res->result == "1") {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test pushmsg.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test pushmsg failed!'));
            }
        }
        $this->redirect('pushover', true);
    }

    public function actionSendTestTweet() {
        $res = $this->do_jsonrpc(array('jsonrpc' => '2.0', 'method' => 'twitter.send', 'params' => array('msg' => 'This is a test Tweet!'), 'id' => 1));
        if ($res) {
            if ($res->result == "1") {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test tweet.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test tweet failed!'));
            }
        }
        $this->redirect('twitter', true);
    }

    public function actionSendTestEmail() {
        $res = $this->do_jsonrpc(array('jsonrpc' => '2.0', 'method' => 'email.send', 'params' => array('msg' => 'If you read this, e-mail support is working!',
                'subject' => 'Test e-mail'), 'id' => 1));
        if ($res) {
            if ($res->result == "1") {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Sent test e-mail.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Sending a test e-mail failed!'));
            }
        }
        $this->redirect('email', true);
    }

    protected function do_save($model) {
        if ($model->save() === false) {
            Yii::app()->user->setFlash('error', Yii::t('app', 'Saving settings failed!'));
        } else {
            Yii::app()->user->setFlash('success', Yii::t('app', 'Settings saved.'));
        }
    }

    protected function do_restart($plugin) {
        $res = $this->do_jsonrpc(array('jsonrpc' => '2.0', 'method' => 'plugin.restart', 'params' => array('name' => $plugin), 'id' => 1));
        if ($res) {
            if ($res->result == "1") {
                Yii::app()->user->setFlash('success', Yii::t('app', 'Saved settings & restarted module.'));
            } else {
                Yii::app()->user->setFlash('error', Yii::t('app', 'Saving settings & restarting module failed!'));
            }
        }
    }

    protected function do_jsonrpc($data = array()) {
        $request = json_encode($data);
        $context = stream_context_create(
            array('http' => array('method' => "POST", 'header' => "Content-Type: application/json\r\n" . "Accept: application/json\r\n", 'content' => $request)));

        $file = @file_get_contents(Yii::app()->params['jsonrpcHost'], false, $context);
        if ($file === FALSE) {
            Yii::app()->user->setFlash('error', "Couldn't connect to JSON-RPC service on '" . Yii::app()->params['jsonrpcHost'] . "'");
        } else {
            return json_decode($file);
        }
    }

}
