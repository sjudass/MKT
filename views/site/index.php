<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Интернет-магазин компьютерной техники';
?>
<div class="container-fluid tabs_block_main">
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Хиты</a></li>
                <li><a href="#tab2" data-toggle="tab">Новинки</a></li>
                <li><a href="#tab3" data-toggle="tab">Акции</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <?php foreach ($hits_array as $hit_array):?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="product">
                            <a href="<?=Url::toRoute(['page/product', 'id' => $hit_array['id'], 'category' => $hits_categories['name'], 'category_id' =>$hits_categories['id']]);?>" class="product_img">
                                <?php if($hit_array['price_old'] != ""):?>
                                    <span>-<?php echo 100 - intval($hit_array['price'] * 100 / $hit_array['price_old']);?>%</span>
                                <?php endif;?>
                                <img src="../images/<?php echo $hit_array['img'];?> ">
                            </a>
                            <a href="<?=Url::toRoute(['page/product', 'id' => $hit_array['id'], 'category' => $hits_categories['name'], 'category_id' =>$hits_categories['id']]);?>" class="product_title"><?php echo $hit_array['name'];?></a>
                            <div class="product_price">
                                <span class="price"><?php echo number_format($hit_array['price'], 0, '.', ' ');?> руб</span>
                                <?php if($hit_array['price_old'] != ""):?>
                                    <span class="price_old"><?php echo number_format($hit_array['price_old'], 0, '.', ' ');?> руб</span>
                                <?php endif;?>
                            </div>

                            <div class="product_btn">
                                <a href="<?=Url::toRoute(['cart/add', 'id' => $hit_array['id']]);?>" data-id="<?= $hit_array['id'];?>" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <?php foreach ($news_array as $new_array):?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <a href="<?=Url::toRoute(['page/product', 'id' => $new_array['id'], 'category' => $news_categories['name'], 'category_id' =>$news_categories['id']]);?>" class="product_img">
                                    <?php if($new_array['price_old'] != ""):?>
                                        <span>-<?php echo 100 - intval($new_array['price'] * 100 / $new_array['price_old']);?>%</span>
                                    <?php endif;?>
                                    <img src="../images/<?php echo $new_array['img'];?> ">
                                </a>
                                <a href="<?=Url::toRoute(['page/product', 'id' => $new_array['id'], 'category' => $news_categories['name'], 'category_id' =>$news_categories['id']]);?>" class="product_title"><?php echo $new_array['name'];?></a>
                                <div class="product_price">
                                    <span class="price"><?php echo number_format($new_array['price'], 0, '.', ' ');?> руб</span>
                                    <?php if($new_array['price_old'] != ""):?>
                                        <span class="price_old"><?php echo number_format($new_array['price_old'], 0, '.', ' ');?> руб</span>
                                    <?php endif;?>
                                </div>

                                <div class="product_btn">
                                    <a href="<?=Url::toRoute(['cart/add', 'id' => $new_array['id']]);?>" data-id="<?= $new_array['id'];?>" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <div class="tab-pane fade" id="tab3">
                    <?php foreach ($sales_array as $sale_array):?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="product">
                                <a href="<?=Url::toRoute(['page/product', 'id' => $sale_array['id'], 'category' => $sales_categories['name'], 'category_id' =>$sales_categories['id']]);?>" class="product_img">
                                    <?php if($sale_array['price_old'] != ""):?>
                                        <span>-<?php echo 100 - intval($sale_array['price'] * 100 / $sale_array['price_old']);?>%</span>
                                    <?php endif;?>
                                    <img src="../images/<?php echo $sale_array['img'];?> ">
                                </a>
                                <a href="<?=Url::toRoute(['page/product', 'id' => $sale_array['id'], 'category' => $sales_categories['name'], 'category_id' =>$sales_categories['id']]);?>" class="product_title"><?php echo $sale_array['name'];?></a>
                                <div class="product_price">
                                    <span class="price"><?php echo number_format($sale_array['price'], 0, '.', ' ');?> руб</span>
                                    <?php if($sale_array['price_old'] != ""):?>
                                        <span class="price_old"><?php echo number_format($sale_array['price_old'], 0, '.', ' ');?> руб</span>
                                    <?php endif;?>
                                </div>

                                <div class="product_btn">
                                    <a href="<?=Url::toRoute(['cart/add', 'id' => $sale_array['id']]);?>" data-id="<?= $sale_array['id'];?>" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i> В корзину</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
