<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Categories;


/*Контроллер для страниц магазина*/
class PageController extends Controller
{
    /*
     * Для страницы каталога*/
    public function actionCatalog()
    {
        $categories = Categories::find()->asArray()->all();
        return $this->render('catalog', compact('categories'));
    }

    /*
     * Для страницы списка товаров*/
    public function actionListproducts()
    {
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $categories = Categories::find()->where(['id' => $_GET['id']])->asArray()->one();
            if(count($categories) > 0)
            {
                return $this->render('listproducts', compact('categories'));
            }
        }
            return $this->redirect(['page/catalog']);
    }

    /*
     * Для страницы новостей*/
    public function actionNews()
    {
        return $this->render('news');
    }

    /*
     * Для страницы контакты*/
    public function actionContacts()
    {
        return $this->render('contacts');
    }

    /*
     * Для страницы входа*/
    public function actionLogin()
    {
        return $this->render('login');
    }

    /*
     * Для страницы личный кабинет*/
    public function actionPersonal()
    {
        return $this->render('personal');
    }

    /*
     * Для страницы обратной связи*/
    public function actionFeedback()
    {
        return $this->render('feedback');
    }

    /*
     * Для страницы доставки*/
    public function actionDelivery()
    {
        return $this->render('delivery');
    }

    /*
     * Для страницы оплаты*/
    public function actionPayment()
    {
        return $this->render('payment');
    }

    /*
     * Для страницы о компании*/
    public function actionAbout()
    {
        return $this->render('about');
    }

    /*
     * Для страницы скидки*/
    public function actionDiscounts()
    {
        return $this->render('discounts');
    }

}
