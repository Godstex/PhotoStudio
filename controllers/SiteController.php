<?php

namespace app\controllers;

use app\models\BuyStudio;
use app\models\Studio;
use app\models\User;
use app\models\Users;
use PHPUnit\Util\Exception;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index',[
            'studio'=>Studio::find()->asArray()->all(),
            'user'=>!Yii::$app->user->isGuest ? User::find()->where(['id'=>Yii::$app->user->getId()])->asArray()->all()[0] : ''
        ]);
    }

    public function actionContact(){
        return $this->render('contact');
    }

    public function actionLogin(){
        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()){
            if (User::find()->where(['id'=>Yii::$app->user->getId()])->asArray()->all()[0]['login'] == 'admin'){
                return $this->redirect('studio');
            }
            return $this->goHome();
        }

        return $this->render('login',[
            'model'=>$model
        ]);
    }

    public function actionRegister(){
        if (Yii::$app->request->isPost){

            $post = Yii::$app->request->post();
            $model = new Users();

            $model->first_name = $post['first_name'];
            $model->last_name = $post['last_name'];
            $model->patronimyc = $post['patronymic'];
            $model->login = $post['login'];
            $model->password = $post['password'];

            if ($model->save()){
                return $this->goHome();
            } else{
                die('Error');
            }

            return $this->goHome();
        }

        return $this->render('register');
    }

    public function actionRentStudio(){
        return $this->render('rent-studio',[
           'model'=>BuyStudio::find()->where(['user_id'=>Yii::$app->user->getId()])->asArray()->all()
        ]);
    }

    public function actionLogout(){
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
