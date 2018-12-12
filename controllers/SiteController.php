<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Products;
use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;


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
        $hits_array = Products::find()->where(['hit' => 1])->limit(8)->all();
        foreach ($hits_array as $hit_array){
            $hits_categories = Categories::find()->where(['id' => $hit_array['category_id']])->asArray()->one();
        }
        $news_array = Products::find()->where(['new' => 1])->limit(8)->all();
        foreach ($news_array as $new_array){
            $news_categories = Categories::find()->where(['id' => $new_array['category_id']])->asArray()->one();
        }
        $sales_array = Products::find()->where(['sale' => 1])->limit(8)->all();
        foreach ($sales_array as $sale_array){
            $sales_categories = Categories::find()->where(['id' => $sale_array['category_id']])->asArray()->one();
        }
        $this->layout = "main";
        return $this->render('index', compact('hits_array', 'news_array', 'sales_array', 'hits_categories', 'news_categories', 'sales_categories'));
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
}
