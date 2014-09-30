<?php
class ScenesController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$model=new Scenes('search');
		$model->unsetAttributes(); // clear any default values

		if(isset($_GET['Scenes']))
		{
			$model->attributes=$_GET['Scenes'];

			if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
			if (!empty($model->description)) $criteria->addCondition('description = "'.$model->description.'"');
			if (!empty($model->type)) $criteria->addCondition('type = "'.$model->type.'"');
		}

		$type = Yii::app()->getRequest()->getParam('type');
		if (isset($type) && !empty($type))
		{
			if ($type == "disabled")
			{
				$model->enabled=0;
				$criteria->addCondition('enabled IS FALSE');
			}
		} 
		$this->render('index', array('model'=>$model));
	}

        public function actionView($id)
        {
                $model = Scenes::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

        public function actionUpdate($id)
        {
                $model = Scenes::model()->findByPk($id);
                if(isset($_POST['Scenes']))
                {
                        $model->attributes=$_POST['Scenes'];
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

        public function actionDelete($id)
        {
                // delete the entry from the "scenes" table
                $model = Scenes::model()->findByPk($id);
                $this->do_delete($model);
        }

        public function actionCreate()
        {
                $model=new Scenes;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_POST['Scenes']))
                {
                        $model->attributes=$_POST['Scenes'];
                        if($model->validate())
                        {
                                $this->do_save($model);
                        }
                }
                $this->render('create',array(
                        'model'=>$model,
                ));
        }

	protected function do_save($model)
	{
		if ( $model->save() === false )
		{
			Yii::app()->user->setFlash('error', "Scene save failed!");
		} else {
			Yii::app()->user->setFlash('success', "Scene saved.");
		}
	}

	protected function do_delete($model)
	{

		if ( $model->delete() === false )
		{
			Yii::app()->user->setFlash('error', "Scene delete failed!");
		} else {
			Yii::app()->user->setFlash('success', "Scene deleted.");
                        $this->redirect(array('index'));
		}
	}
}
