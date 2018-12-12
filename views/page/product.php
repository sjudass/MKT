<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = $product['name'];
?>
<div class="row">
    <div class="col-lg-12 contant_wrap">
        <div class="navigation">
            <ul>
                <li><a href="/site/index"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="/page/catalog">Каталог</a></li>
                <?php if (isset($category) && isset($category_id)):?>
                    <li><a href="/page/listproducts?id=<?= $category_id?>"><?= $category;?></a></li>
                <?php endif;?>
                <li><span><?= $product['name'];?></span></li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="row content page_prod">

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                <div class="img_product">
                    <img src="../images/<?= $product['img']?>">
                </div>
            </div>

            <div class="col-lg-5 col-md-8 col-sm-7 col-xs-12">
                <div class="content_prod">
                    <h1><?=$product['name']?></h1>
                    <p><span>Артикул:</span> <?=$product['article']?></p>
                    <?php if ($product['in_stock'] > 0):?>
                        <p id="instock" data-id="<?=$product['in_stock']?>">В наличии: <?=$product['in_stock']?></p>
                    <?php else:?>
                        <p style="color: red">Нет в наличии</p>
                    <?php endif;?>
                    <p><?=$product['description']?></p>
                </div>
            </div>

            <div class="col-lg-3 col-md-8 col-sm-7 col-sm-offset--5 col-xs-12">
                <?php if ($product['in_stock'] > 0):?>
                    <div class="order_prod">
                        <p class="price_prod"><?=$product['price']?> руб</p>
                        <?php if($product['price_old'] != ""):?>
                            <p class="price_old_prod"><?=$product['price_old']?> руб</p>
                        <?php endif;?>
                        <p>Количество:</p>
                        <form>
                            <input type="text" id="addqty"  name="" value="1" class="input_text pointer">
                            <button id="minus">-</button>
                            <button id="plus">+</button>
                        </form>
                        <a href="<?=Url::toRoute(['/cart/add', 'id' => $product['id']]);?>" data-id="<?=$product['id'];?>" class="add_cart_prod cart"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</a>
                       <!-- <a href="#" class="add_mylist_prod"><i class="glyphicon glyphicon-heart"></i>В список желаний</a>-->
                    </div>
                <?php else:?>
                    <div class="order_prod not-allowed">
                        <p class="price_prod"><?=$product['price']?> руб</p>
                        <?php if($product['price_old'] != ""):?>
                            <p class="price_old_prod"><?=$product['price_old']?> руб</p>
                        <?php endif;?>
                        <p>Количество:</p>
                        <form>
                            <input type="text" value="1" class="input_text pointer">
                            <button id="minus" class="pointer">-</button>
                            <button id="plus" class="pointer">+</button>
                        </form>
                        <a href="#" class="add_cart_prod pointer"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</a>
                        <a href="#" class="add_mylist_prod pointer"><i class="glyphicon glyphicon-heart"></i>В список желаний</a>
                    </div>
                <?php endif;?>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="h_prod">
                    <h3>Характеристики:</h3>
                    <table class="table table-striped table-bordered">
                        <?php foreach ($characteristics as $characteristic):?>
                            <tr>
                                <td><?=$characteristic['name']?></td>
                                <td><?=$characteristic['text']?></td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
