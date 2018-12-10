<?php

namespace app\controllers;

use app\models\Country;
use app\models\RegisterForm;
use app\models\TestForm;
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
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
        $this->layout = "main";
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $user = new RegisterForm();
        if ($user->load(Yii::$app->request->post())) {
            if (!$user->findUser()){
                if (($user->password) === ($user->confpass)){
                    $adduser = new User();
                    $adduser->login = $user->login;
                    $adduser->password = $user->password;
                    $adduser->email = $user->email;
                    $adduser->isAdmin = 0;
                    $adduser->save();
                    $user->login();
                    return $this->goBack();
                }
                else{
                        Yii::$app->session->setFlash('error','Пароли не совпадают');
                }
            }
            else
            {
                Yii::$app->session->setFlash('error','Ошибка записи, пользователь уже существует');
            }
        }
        return $this->render('register', ['user' => $user]);
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionMsg($msg = 'Hello')
    {
        return $this->render('message', ['msg' => $msg]);
    }

    public function actionTest()
    {
        $model = new TestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            return $this->render('Test-confirm', ['model' => $model]);
        }
        else
        {
            return $this->render('test', ['model' => $model]);
        }
    }

    public function actionCountries()
    {
        $newcountry = new Country();

        if ($newcountry->load(Yii::$app->request->post()) && $newcountry->validate())
        {
            if ($newcountry->save()){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error','Ошибка записи');
            }
        }
        $countries = Country::find()->all();
        return $this->render('countries', ['countries' => $countries, 'newcountry' => $newcountry]);
    }
}
