<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('success');?>
    </div>
<?php endif;?>

<?php if(Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('error');?>
    </div>
<?php endif;?>

<?php if(!empty($session['cart'])):?>
    <div class="row">
        <div class="contant_wrap">
            <div class="col-lg-12">
                <div class="navigation">
                    <ul>
                        <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                        <li><a href="<?=Url::toRoute(['/site/index']);?>">Главная</a></li>
                        <li><span>Оформление заказа</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr class="cart_prod_head">
                    <th>Товар</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($session['cart'] as $id => $item): ?>
                    <tr class="cart_prod_content">
                        <td class="img_cart"><img src="../images/<?= $item['img'];?>"></td>
                        <td class="title_cart"><a href="<?=Url::toRoute(['page/product', 'id' => $id]);?>"><?= $item['name'];?></a></td>
                        <td class="value_cart"><?= $item['qty'];?></td>
                        <td class="price_cart"><?= number_format($item['price'], 0, '.', ' ');?> руб</td>
                        <td class="price_cart"><?= number_format($item['price'] * $item['qty'], 0, '.', ' ');?> руб</td>
                        <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach;?>
                <tr class="cart_prod_footer">
                    <td colspan="4" class="rez_title_cart">Итого товаров:</td>
                    <td colspan="2" class="rez_price_cart"><?= $session['cart.qty'];?></td>
                </tr>
                <tr class="cart_prod_footer">
                    <td colspan="4" class="rez_title_cart">На сумму:</td>
                    <td colspan="2" class="rez_price_cart"><?= number_format($session['cart.sum'], 0, '.', ' ');?> руб</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6 col-xs-12 col-md-9">
            <h2 id="addorder">Оформление заказа</h2>
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($order, 'name')?>
            <?= $form->field($order, 'email')?>
            <?= $form->field($order, 'phone')?>
            <?= $form->field($order, 'address')?>
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-info'])?>
            <?php ActiveForm::end()?>
        </div>
    </div>
<?php else:?>
    <div class="empty_cart">
        <h3>Корзина пуста</h3>
    </div>
<?php endif;?>
