<?php

namespace app\controllers;

class AdminController extends \yii\web\Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest){
            return  $this->goHome();
        }

        //TODO:Проверка на имя логина "admin"

        return $this->redirect('index');
    }

}
