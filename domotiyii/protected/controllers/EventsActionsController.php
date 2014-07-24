<?php

class EventsActionsController extends Controller
{
        public function actionIndex()
        {
                $model = EventsActions::model();
                $this->render('index', array('model'=>$model));
        }

        public function actionView($id)
        {
                $model = EventsActions::model()->findByPk($id);
                $this->render('view', array('model'=>$model));
        }

        public function actionUpdate($id)
        {
                $model = EventsActions::model()->findByPk($id);
                if(isset($_POST['EventsActions']))
                {
                        $model->attributes=$_POST['EventsActions'];
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

        public function actionDelete()
        {
                // delete the entry from the "events_actions" table
                $idEvent=yii::app()->request->getParam('eventid');
                $idAction=yii::app()->request->getParam('actionid');
                $model = EventsActions::model()->find("t.event='$idEvent' and t.action='$idAction'");
                $this->do_delete($model);
                //checking and updating order FIXME TO BE DONE BETTER !!!!!!!!!!!!!!!!!!!!
                $result=yii::app()->db->createCommand("select event,action,`order` from events_actions where event=".$idEvent)->queryAll();
                $nb=0;
                $correction=array();
                foreach($result as $row) {
                    if($row['order']!==$nb) {
                        array_push($correction,"update events_actions set `order`=".$nb." where event=".$idEvent." and action=".$row['action']);
                    }
                    $nb++;
                }
                foreach($correction as $c)
                    yii::app()->db->createCommand($c)->execute ();
        }

        public function actionCreate()
        {
                $model=new EventsActions;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if(isset($_GET['EventsActions']))
                {
                        $model->attributes=$_GET['EventsActions'];
                        $result=yii::app()->db->createCommand("select max(`order`) from events_actions where event=".$model->event)->queryScalar();
                        if(is_null($result)) $result=-1;
                        $model->order = $result + 1;
                        if($model->validate())
                        {
                                $this->do_save($model);
                                echo "OK";
                        } else echo "KO";
                } else
                $this->render('create',array(
                        'model'=>$model,
                ));
        }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

        protected function do_save($model)
        {
                if ( $model->save() === false )
                {
                        Yii::app()->user->setFlash('error', "Saving eventsaction... Failed!");
                } else {
                        Yii::app()->user->setFlash('success', "Saving eventsaction... Successful.");
                }
        }

        protected function do_delete($model)
        {

                if ( $model->delete() === false )
                {
                        Yii::app()->user->setFlash('error', "Deleting eventsaction... Failed!");
                } else {
                        Yii::app()->user->setFlash('success', "Deleting eventsaction... Successful.");
                }
        }

}
