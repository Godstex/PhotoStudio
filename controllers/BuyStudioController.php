<?php

namespace app\controllers;

class BuyStudioController extends \yii\web\Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
