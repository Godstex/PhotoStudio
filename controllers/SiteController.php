<?php

namespace app\controllers;

use app\models\User;
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
        if (!Yii::$app->user->isGuest){

            $user = User::find(Yii::$app->user->getId())->asArray()->all();

            return $this->render('index',[
                'user'=>$user
            ]);
        }
        return $this->render('index',['user'=>'GG']);
    }

    public function actionContact(){
        return $this->render('contact');
    }

    public function actionLogin(){
        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()){

            if (User::findOne(Yii::$app->user->getId())['login'] == 'admin'){
                return $this->redirect('admin');
            }
            return $this->goHome();
        }

        return $this->render('login',[
            'model'=>$model
        ]);
    }

    public function actionLogout(){
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
