<?php

class CmdController extends Controller {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $model = new Devices('search');
        $model->unsetAttributes(); // clear any default values

        $type = Yii::app()->getRequest()->getParam('type','enabled');
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
            } elseif ($type == "enabled") {
                $model->enabled = -1;
                $model->hide = 0;
                $criteria->addCondition('hide IS FALSE');
                $criteria->addCondition('enabled IS TRUE');
            } elseif ($type == "disabled") {
                $model->enabled = 0;
                $criteria->addCondition('enabled IS FALSE');
            }
        }

        if (!is_null(yii::app()->request->getParam('ajax')))
            $this->renderPartial('indexValues', array('model' => $model));
        else
            $this->render('indexValues', array('model' => $model));
    }
}
