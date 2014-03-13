<?php

class DevicesController extends Controller {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $model = new Devices('search');
        $model->unsetAttributes(); // clear any default values

        if (isset($_GET['Devices'])) {
            $model->attributes = $_GET['Devices'];

            if (!empty($model->name))
                $criteria->addCondition('name = "' . $model->name . '"');
            if (!empty($model->address))
                $criteria->addCondition('address = "' . $model->address . '"');
            if (!empty($model->module))
                $criteria->addCondition('module = "' . $model->module . '"');
            if (!empty($model->interface))
                $criteria->addCondition('interface = "' . $model->interface . '"');
        }

        $type = Yii::app()->getRequest()->getParam('type');
        if (isset($type) && !empty($type)) {
            if ($type == "sensors") {
                $model->switchable = 0;
                $model->dimable = 0;
                $criteria->addCondition('switchable IS FALSE');
                $criteria->addCondition('dimable IS FALSE');
            } elseif ($type == "dimmers") {
                $model->dimable = -1;
                $criteria->addCondition('dimable IS TRUE');
            } elseif ($type == "switches") {
                $model->switchable = -1;
                $criteria->addCondition('switchable IS TRUE');
            } elseif ($type == "hidden") {
                $model->hide = -1;
                $criteria->addCondition('hide IS TRUE');
            } elseif ($type == "disabled") {
                $model->enabled = 0;
                $criteria->addCondition('enabled IS FALSE');
            }
        }

        $location = Yii::app()->getRequest()->getParam('location');
        if (isset($location) && !empty($location)) {
            if ($type != "0") {
                $model->location = $location;
                $criteria->addCondition('location = "' . $location . '"');
                $criteria->addCondition('dimable IS FALSE');
            }
        }

        $locations = Locations::model();
        $this->render('index', array('model' => $model, 'locations' => $locations));
    }

    public function actionIndexValues() {
        $criteria = new CDbCriteria();
        $model = new Devices('search');
        $model->unsetAttributes(); // clear any default values

        if (isset($_GET['Devices'])) {
            $model->attributes = $_GET['Devices'];

            if (!empty($model->name))
                $criteria->addCondition('name = "' . $model->name . '"');
            if (!empty($model->address))
                $criteria->addCondition('address = "' . $model->address . '"');
            if (!empty($model->module))
                $criteria->addCondition('module = "' . $model->module . '"');
            if (!empty($model->interface))
                $criteria->addCondition('interface = "' . $model->interface . '"');
        }

        $type = Yii::app()->getRequest()->getParam('type');
        if (isset($type) && !empty($type)) {
            if ($type == "sensors") {
                $model->switchable = 0;
                $model->dimable = 0;
                $criteria->addCondition('switchable IS FALSE');
                $criteria->addCondition('dimable IS FALSE');
            } elseif ($type == "dimmers") {
                $model->dimable = -1;
                $criteria->addCondition('dimable IS TRUE');
            } elseif ($type == "switches") {
                $model->switchable = -1;
                $criteria->addCondition('switchable IS TRUE');
            } elseif ($type == "hidden") {
                $model->hide = -1;
                $criteria->addCondition('hide IS TRUE');
            } elseif ($type == "disabled") {
                $model->enabled = 0;
                $criteria->addCondition('enabled IS FALSE');
            }
        }

        $location = Yii::app()->getRequest()->getParam('location');
        if (isset($location) && !empty($location)) {
            if ($type != "0") {
                $model->location = $location;
                $criteria->addCondition('location = "' . $location . '"');
                $criteria->addCondition('dimable IS FALSE');
            }
        }

        $locations = Locations::model();
        $this->render('indexValues', array('model' => $model, 'locations' => $locations));
    }

    public function actionView($id) {
        $model = Devices::model()->findByPk($id);
        $this->render('view', array('model' => $model));
    }

    public function actionUpdate($id) {
        $model = Devices::model()->findByPk($id);
        if (isset($_POST['Devices'])) {
            $model->attributes = $_POST['Devices'];
            if (isset($_POST['Devices']['groupsarray']) && count($_POST['Devices']['groupsarray']) !== 0)
                $model->groups = '|' . implode('|', $_POST['Devices']['groupsarray']) . '|';
            else
                $model->groups = '|';

            if ($model->validate()) {
                // form inputs are valid, do something here
                $this->do_save($model);
            }
            else
                Yii::app()->user->setFlash('error', "Invalid Data.");
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        // delete the related entries from the "devices_log,device_values" table first
        $model = DeviceValuesLog::model()->deleteAll("device_id ='" . $id . "'");
        $model = DeviceValues::model()->deleteAll("device_id ='" . $id . "'");

        // delete the entry from the "devices" table
        $model = Devices::model()->findByPk($id);
        $this->do_delete($model);
    }

    public function actionUpdateModule() {
        // update "module" dropdown
        $protocol = $_POST['protocol'];
        if (strlen($protocol)) {

            $data = Devices::model()->getDeviceTypesByType($protocol);
            $dropDownModule = "<option value='null'>Select Module</option>";
            foreach ($data as $value => $name)
                $dropDownModule .= CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        } else {
            $data = Devices::model()->getDeviceTypes();
            $dropDownModule = "<option value='null'>Select Module</option>";
            foreach ($data as $value => $name)
                $dropDownModule .= CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }

        // update "interfaces" dropdown
        $data = Devices::model()->getInterfacesByDeviceType($protocol);
        $dropDownInterface = "<option value='null'>Select Interface</option>";

        foreach ($data as $value => $name)
            $dropDownInterface .= CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);

        // return data in JSON format
        echo CJSON::encode(array(
            'dropDownModule' => $dropDownModule,
            'dropDownInterface' => $dropDownInterface
        ));
    }

    public function actionUpdateAddressFormat() {
        // test
        echo CHtml::textField('addressformat', array('value' => 'A01'));
    }

    //FIXME : just created to avoid an error on create
    public function actionUpdateAddressFormat2() {
        // test
        echo CHtml::textField('addressformat', array('value' => 'A01'));
    }

    public function actionCreate() {
        $model = new Devices;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Devices'])) {
            $model->attributes = $_POST['Devices'];
            if (isset($_POST['Devices']['groupsarray']) && count($_POST['Devices']['groupsarray']) !== 0)
                $model->groups = '|' . implode('|', $_POST['Devices']['groupsarray']) . '|';
            else
                $model->groups = '|';

            if ($model->validate()) {
                $this->do_save($model);
                $this->redirect(array('update', 'id' => $model->id));
            } else {
                //FIXME: to be done better but good now for debugging
                Yii::app()->user->setFlash('error', print_r($model->getErrors(), true));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    protected function do_save($model) {
        if ($model->save() === false) {
            Yii::app()->user->setFlash('error', "Device save failed!");
        } else {
            Yii::app()->user->setFlash('success', "Device saved.");
        }
    }

    protected function do_delete($model) {
        if ($model->delete() === false) {
            Yii::app()->user->setFlash('error', "Device delete failed!");
        } else {
            Yii::app()->user->setFlash('success', "Device deleted.");
            $this->redirect(array('index'));
        }
    }

}
