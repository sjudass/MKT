<?php
$this->title = 'Список товаров';
?>
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
                    <h1>Ноутбуки</h1>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 value_prod">
                    <p>В наличии: 6</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 sortirovka_and_number_prod">
                    <form action="#">
                        <p><strong>Сортировка по:</strong>
                            <select name="sortirovka_prod">
                                <option selected="selected">--</option>
                                <option value="0">Цене, по возрастанию</option>
                                <option value="1">Цене, по убыванию</option>
                                <option value="2">Названию товара, от А до Я</option>
                                <option value="3">Названию товара, от Я до А</option>
                            </select>
                        </p>
                        <p><strong>Показать:</strong>
                            <select name="number_prod_str">
                                <option selected="selected">12</option>
                                <option value="0">24</option>
                                <option value="1">48</option>
                            </select>
                        </p>
                        <button type="submit">Go</button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs view_list_prod">
                    <p><strong>Вид:</strong>
                        <a href="#"><i class="glyphicon glyphicon-th"></i><span>Сетка</span></a>
                        <a href="#"><i class="glyphicon glyphicon-th-list"></i><span>Список</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="../images/prod1.jpg">
                </a>
                <a href="#" class="product_title">Lenovo Legion Y520-15IKBN</a>
                <div class="product_price">
                    <span class="price">49 999 руб</span>
                    <span class="price_old">54 999 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="../images/prod1.jpg">
                </a>
                <a href="#" class="product_title">Lenovo Legion Y520-15IKBN</a>
                <div class="product_price">
                    <span class="price">49 999 руб</span>
                    <span class="price_old">54 999 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="../images/prod1.jpg">
                </a>
                <a href="#" class="product_title">Lenovo Legion Y520-15IKBN</a>
                <div class="product_price">
                    <span class="price">49 999 руб</span>
                    <span class="price_old">54 999 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="../images/prod1.jpg">
                </a>
                <a href="#" class="product_title">Lenovo Legion Y520-15IKBN</a>
                <div class="product_price">
                    <span class="price">49 999 руб</span>
                    <span class="price_old">54 999 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="../images/prod1.jpg">
                </a>
                <a href="#" class="product_title">Lenovo Legion Y520-15IKBN</a>
                <div class="product_price">
                    <span class="price">49 999 руб</span>
                    <span class="price_old">54 999 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12">
            <div class="product">
                <a href="#" class="product_img">
                    <span>-10%</span>
                    <img src="../images/prod1.jpg">
                </a>
                <a href="#" class="product_title">Lenovo Legion Y520-15IKBN</a>
                <div class="product_price">
                    <span class="price">49 999 руб</span>
                    <span class="price_old">54 999 руб</span>
                </div>
                <div class="product_btn">
                    <a href="#" class="cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                    <a href="#" class="mylist">Список желаний</a>
                </div>
            </div>
        </div>
    </div>
</div>