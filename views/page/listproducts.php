<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Список товаров';
?>
<div class="row">
    <div class="col-lg-12 contant_wrap">
        <div class="navigation">
            <ul>
                <li><a href="/site/index"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><a href="/page/catalog">Каталог</a></li>
                <li><span><?php echo $categories['name'];?></span></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12 filter">
    <h3>Фильтры</h3>
    <form>
        <label>Цена / руб</label>
        <div class="filter_price">
            <input type="text" value="0">
            -
            <input type="text" value="500000">
        </div>
        <label>Диагональ экрана/ "</label>
        <div class="filter_check">
            <p><input type="checkbox"/>от 10" до 12.6"</p>
            <p><input type="checkbox"/>от 13" до 14.4"</p>
            <p><input type="checkbox"/>от 15" до 16.4"</p>
            <p><input type="checkbox"/>17" и более</p>
        </div>

        <button type="submit">Подобрать</button>
    </form>
</div>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="short_description">
        <img src="../images/<?php echo $categories['img'];?>">
        <div>
            <h2><?php echo $categories['name'];?></h2>
            <p><?php echo $categories['description'];?></p>
        </div>
    </div>
    <div class="row content">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header_list_prod">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <h1><?php echo $categories['name'];?></h1>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 value_prod">
                    <p>В наличии: <?php echo $count_products;?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                   <?php $form = ActiveForm::begin();?>
                    <p><strong>Сортировка по:</strong><?php echo $form->field($model,'sortby')->dropDownList([
                            '0' => 'Цене, по возрастанию',
                            '1' => 'Цене, по убыванию',
                            '2' => 'Названию товара, от А до Я',
                            '3' => 'Названию товара, от Я до А',
                        ],
                            ['prompt' => '--']);?></p>
                    <p><strong>Показать:</strong><?php echo $form->field($model,'number')->dropDownList([
                            '12' => '12',
                            '24' => '24',
                            '48' => '48'
                        ],
                            ['options' => ['12' => ['Selected' => true]],]);?></p>
                    <?php echo Html::submitButton('Применить',['class' => 'form-button']);?>
                   <?php ActiveForm::end();?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs view_list_prod">
                    <p><strong>Вид:</strong>

                        <?php if($view ==1):?>
                            <a href="<?=Url::toRoute(['page/listproducts', 'id' => $categories['id']]);?>"><i class="glyphicon glyphicon-th"></i><span>Сетка</span></a>
                            <a href="<?=Url::toRoute(['page/listproducts', 'id' => $categories['id'], 'view' => '1']);?>"><i class="glyphicon glyphicon-th-list" style="color: #333;"></i><span>Список</span></a>
                        <?php else:?>
                            <a class="active" href="<?=Url::toRoute(['page/listproducts', 'id' => $categories['id']]);?>"><i class="glyphicon glyphicon-th" style="color: #333;"></i><span>Сетка</span></a>
                            <a href="<?=Url::toRoute(['page/listproducts', 'id' => $categories['id'], 'view' => '1']);?>"><i class="glyphicon glyphicon-th-list"></i><span>Список</span></a>
                        <?php endif;?>
                    </p>
                </div>
            </div>
        </div>

        <?php foreach ($products_array as $product_array):?>
            <?php if($view == 1):?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 view_list">
                    <div class="product">
                        <a href="<?=Url::toRoute(['page/product', 'id' => $product_array['id']]);?>" class="product_img">
                            <?php if($product_array['price_old'] != ""):?>
                                <span>-<?php echo 100 - intval($product_array['price'] * 100 / $product_array['price_old']);?>%</span>
                            <?php endif;?>
                            <img src="../images/<?php echo $product_array['img'];?> ">
                        </a>
                        <a href="<?=Url::toRoute(['page/product', 'id' => $product_array['id']]);?>" class="product_title spisok"><?php echo $product_array['name'];?></a>
                        <div class="product_price spisok">
                            <span class="price"><?php echo number_format($product_array['price'], 0, '.', ' ');?> руб</span>
                            <?php if($product_array['price_old'] != ""):?>
                                <span class="price_old"><?php echo number_format($product_array['price_old'], 0, '.', ' ');?> руб</span>
                            <?php endif;?>
                        </div>

                        <div class="desc_product">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td>Объем, лс</td>
                                    <td>40</td>
                                </tr>
                                <tr>
                                    <td>Вес, кг</td>
                                    <td>1,2</td>
                                </tr>
                                <tr>
                                    <td>Высота, см</td>
                                    <td>50</td>
                                </tr>
                            </table>
                        </div>

                        <div class="product_btn spisok">
                            <a href="<?=Url::toRoute(['page/cart', 'id' => $product_array['id']]);?>" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                            <a href="<?=Url::toRoute(['page/listorder', 'id' => $product_array['id']]);?>" class="mylist">Список желаний</a>
                        </div>
                    </div>
                </div>
            <?php else:?>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
                    <div class="product">
                        <a href="<?=Url::toRoute(['page/product', 'id' => $product_array['id']]);?>" class="product_img">
                            <?php if($product_array['price_old'] != ""):?>
                                <span>-<?php echo 100 - intval($product_array['price'] * 100 / $product_array['price_old']);?>%</span>
                            <?php endif;?>
                            <img src="../images/<?php echo $product_array['img'];?> ">
                        </a>
                        <a href="<?=Url::toRoute(['page/product', 'id' => $product_array['id']]);?>" class="product_title"><?php echo $product_array['name'];?></a>
                        <div class="product_price">
                            <span class="price"><?php echo number_format($product_array['price'], 0, '.', ' ');?> руб</span>
                            <?php if($product_array['price_old'] != ""):?>
                                <span class="price_old"><?php echo number_format($product_array['price_old'], 0, '.', ' ');?> руб</span>
                            <?php endif;?>
                        </div>

                        <div class="product_btn">
                            <a href="<?=Url::toRoute(['page/cart', 'id' => $product_array['id']]);?>" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                            <a href="<?=Url::toRoute(['page/listorder', 'id' => $product_array['id']]);?>" class="mylist">Список желаний</a>
                        </div>
                    </div>
                </div>
            <?php endif;?>

        <?php endforeach;?>
    </div>
    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
</div>