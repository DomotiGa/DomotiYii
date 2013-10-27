<?php

class DevicetypesController extends Controller
{
        public function actionIndex()
        {
		$criteria = new CDbCriteria();
		$model=new Devicetypes('search');
		$model->unsetAttributes(); // clear any default values

		if(isset($_GET['Devicetypes']))
		{
			$model->attributes=$_GET['Devicetypes'];

			if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
			if (!empty($model->description)) $criteria->addCondition('description = "'.$model->description.'"');
			if (!empty($model->type)) $criteria->addCondition('type = "'.$model->type.'"');
			if (!empty($model->addressformat)) $criteria->addCondition('addressformat = "'.$model->addressformat.'"');
		}
		$this->render('index', array('model'=>$model));
	}

	public function actionView($id)
        {
                $model = Devicetypes::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

        public function actionUpdate($id)
        {
                $model = Devicetypes::model()->findByPk($id);
                if(isset($_POST['Devicetypes']))
                {
                        $model->attributes=$_POST['Devicetypes'];
                        if($model->validate())
                        {
                                // form inputs are valid, do something here
                                $this->do_save($model);
                        }
                }
                $this->render('update',array(
                        'model'=>$model,
                ));
        }

        public function actionCreate()
        {
                $model=new Devicetypes;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Devicetypes']))
                {
                        $model->attributes=$_POST['Devicetypes'];
                        if($model->validate())
                        {
                                $this->do_save($model);
                        }
                }
                $this->render('create',array(
                        'model'=>$model,
                ));
        }

        public function actionDelete($id)
        {
                // delete the entry from the "devicetypes" table
                $model = Devicetypes::model()->findByPk($id);
                $this->do_delete($model);

        }

        protected function do_save($model)
        {
                if ( $model->save() === false )
                {
                        Yii::app()->user->setFlash('error', Yii::t('app','Devicetype save failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Devicetype saved.'));
                }
        }

        protected function do_delete($model)
        {
                if ( $model->delete() === false )
                {
                        Yii::app()->user->setFlash('error', Yii::t('app','Devicetype delete failed!'));
                } else {
                        Yii::app()->user->setFlash('success', Yii::t('app','Devicetype deleted.'));
                }
        }
}
