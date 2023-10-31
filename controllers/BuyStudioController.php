<?php

namespace app\controllers;

use app\models\BuyStudio;
use app\models\Studio;

class BuyStudioController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        return $this->render('index',[
            'id'=>Studio::findOne($id)
        ]);
    }

    public function actionRent(){
        if (\Yii::$app->request->post()){
            $post = \Yii::$app->request->post();

            $model = new BuyStudio();

            $model->user_id = $post['id_user'];
            $model->studio_id = $post['id_studio'];
            $model->members = $post['members'];
            $model->time_date = $post['time_date'];
            $model->time_ur = $post['time_ur'];

            if ($model->save()){
                return $this->goHome();
            }
        } else
            return $this->goHome();
    }

    public function actionTable(){
        $this->layout = 'admin';
        return $this->render('table',[
            'model'=>BuyStudio::find()->asArray()->all()
        ]);
    }

}
