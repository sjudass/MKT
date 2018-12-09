<?php

namespace app\controllers;


use yii\web\Controller;
use app\models\Products;
use app\models\Cart;
use Yii;


/*Контроллер для корзины*/
class CartController extends Controller
{
    public function actionAdd() {
        $id = Yii::$app->request->get('id');
        $product = Products::findOne($id);
        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        $this -> layout = false;
        return $this->render('cart', compact('session'));
    }
}