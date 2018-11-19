<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Categories;
use app\models\Products;
use app\models\SortForm;


/*Контроллер для страниц магазина*/
class PageController extends Controller
{
    /*
     * Для страницы списка желаний*/
    public function actionListorder()
    {
        // $categories = Categories::find()->asArray()->all();
        return $this->render('listorder');
    }

    /*
     * Для страницы корзины*/
    public function actionCart()
    {
        // $categories = Categories::find()->asArray()->all();
        return $this->render('cart');
    }

    /*
     * Для страницы каталога*/
    public function actionProduct()
    {
       // $categories = Categories::find()->asArray()->all();
        return $this->render('product');
    }

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
                $model = new SortForm();

                if($model->load(Yii::$app->request->post()) && $model->validate())
                {
                   /* echo "<pre>";
                    print_r($model);
                    echo "</pre>";*/
                   //Обработчик для формы сортировки
                }

                $products_array = Products::find()->where(['category_id' => $_GET['id']])->asArray()->all();
                $count_products = count($products_array);
                if (isset($_GET['view']) && $_GET['view'] == 1)
                {
                    $view = 1;
                }
                else{
                    $view = 0;
                }
                return $this->render('listproducts', compact('categories','products_array', 'count_products','view','model'));
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
