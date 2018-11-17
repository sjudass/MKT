<?php

namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


/*Контроллер для страниц магазина*/
class PageController extends Controller
{
    /*
     * Для страницы списка товаров*/
    public function actionListproducts()
    {
        return $this->render('listproducts');
    }
}
