<?php

namespace app\controllers;


use app\models\Characteristics;
use app\models\Reviews;
use app\models\Users;
use Yii;
use yii\data\Pagination;
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
        if (isset($_GET['id']) && $_GET['id'] != "" && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $product = Products::find()->where(['id' => $_GET['id']])->asArray()->one();
            if(count($product) > 0)
            {
                $characteristics = Characteristics::find()->where(['id_prod' => $product['id']])->asArray()->all();
                $reviews = Reviews::find()->where(['id_prod' => $product['id']])->asArray()->all();
                foreach ($reviews as $review){
                    $users = Users::find()->where(['id' => $review['id_user']])->asArray()->all();
                }
                if (isset($_GET['category']))
                {
                    $category = $_GET['category'];
                    $category_id = $_GET['category_id'];
                }

                return $this->render('product', compact('product','characteristics', 'category', 'category_id'));
            }
        }
        return $this->redirect(['page/listproducts?id='.$_GET['category_id']]);
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
                    switch ($model->sortby){
                        case "":
                            $query_select = Products::find()->where(['category_id' => $_GET['id']]);
                            break;
                        case 0:
                            $query_select = Products::find()->orderBy(['price' => SORT_ASC])->where(['category_id' => $_GET['id']]);
                            break;
                        case 1:
                            $query_select = Products::find()->orderBy(['price' => SORT_DESC])->where(['category_id' => $_GET['id']]);
                            break;
                        case 2:
                            $query_select = Products::find()->orderBy('name')->where(['category_id' => $_GET['id']]);
                            break;
                        case 3:
                            $query_select = Products::find()->orderBy('name DESC')->where(['category_id' => $_GET['id']]);
                            break;
                    }

                    switch ($model->number){
                        case 12:
                        {
                            $size = 12;
                            break;
                        }
                        case 24:
                        {
                            $size = 24;
                            break;
                        }

                        case 48:
                        {
                            $size = 48;
                            break;
                        }

                    }
                    $query = $query_select;
                    $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => $size]);
                    $products_array = $query->offset($pages->offset)->limit($pages->limit)->all();
                   //Обработчик для формы сортировки
                }
                else
                {
                    $query = Products::find()->where(['category_id' => $_GET['id']]);
                    $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12]);
                    $products_array = $query->offset($pages->offset)->limit($pages->limit)->all();
                }
                $counts = Products::find()->where(['category_id' => $_GET['id']])->asArray()->all();
                $count_products = count($counts);

                if (isset($_GET['view']) && $_GET['view'] == 1)
                {
                    $view = 1;
                }
                else{
                    $view = 0;
                }
                return $this->render('listproducts', compact('categories','products_array', 'count_products','view','model','pages'));
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
