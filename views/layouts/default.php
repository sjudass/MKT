<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DefaultAsset;

DefaultAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<header>
    <div class="container">
        <div class="row header_top">
            <div class="logo col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <a href="/"><img src="../images/logo.png"></a>
            </div>
            <div class="btn_top_wrap col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="btn_and_search">
                    <div class="btn_top">
                        <a href="#"><i class="glyphicon glyphicon-map-marker"></i>Обратная связь</a>
                        <a href="#"><i class="glyphicon glyphicon-user"></i>Личный кабинет</a>
                        <a href="#"><i class="glyphicon glyphicon-lock"></i>Войти</a>
                    </div>
                    <div class="search_top">
                        <form>
                            <input placeholder="Поиск" type="text">
                            <button type="submit" name="submit_search">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="cart_top">
                    <a href="#">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <span>0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid menu_top">
        <div class="container">
            <div class="row">

                <?php

                NavBar::begin([
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => ' ',
                    ],
                ]);
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'items' => [
                        ['label' => 'Главная', 'url' => ['/site/index']],
                        ['label' => 'Ноутбуки', 'url' => ['/page/listproducts']],
                        ['label' => 'Компьютеры', 'url' => ['#']],
                        ['label' => 'Смартфоны', 'url' => ['#']],
                        ['label' => 'Телевизоры', 'url' => ['#']],
                        ['label' => 'Приставки', 'url' => ['#']],
/*                        Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                        ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                        )*/
                    ],
                ]);
                NavBar::end();

                ?>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-12 contant_wrap">
            <div class="navigation">
                <ul>
                    <li><a href="/site/index"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="/site/index">Главная</a></li>
                    <li><span>Ноутбуки</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
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
                <img src="../images/prod1.jpg">
                <div>
                    <h2>Ноутбуки</h2>
                    <p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>
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
    </div>
</div>

<div class="container-fluid write_email_and_sseti">
    <div class="container">
        <div class="row write_email_and_sseti_wrap">
            <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12 write_email">
                <p>Рассылка</p>
                <form>
                    <button type="submit">
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                    <input type="text" placeholder="Введите E-mail">
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-5 hidden-xs sseti_wrap">
                <div>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-vk"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid footer">
    <div class="container">
        <div class="row menu_footer_and_contact">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="footer_menu">
                    <h3>Категории</h3>
                    <ul>
                        <li><a href="#">Ноутбуки</a></li>
                        <li><a href="#">Компьютеры</a></li>
                        <li><a href="#">Смартфоны</a></li>
                        <li><a href="#">Телевизоры</a></li>
                        <li><a href="#">Приставки</a></li>
                    </ul>
                </div>
                <div class="footer_menu">
                    <h3>Информация</h3>
                    <ul>
                        <li><a href="#">Доставка</a></li>
                        <li><a href="#">Оплата</a></li>
                        <li><a href="#">О компании</a></li>
                        <li><a href="#">Скидки</a></li>
                        <li><a href="#">Карта сайта</a></li>
                    </ul>
                </div>
                <div class="footer_menu">
                    <h3>Учетная запись</h3>
                    <ul>
                        <li><a href="#">Войти</a></li>
                        <li><a href="#">Зарегистрироваться</a></li>
                        <li><a href="#">Мои заказы</a></li>
                        <li><a href="#">Список желаний</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 contacts">
                <h3>Контакты</h3>
                <p><i class="glyphicon glyphicon-map-marker"></i>Адрес: ул. Нежинская, 7 г. Москва</p>
                <p><i class="glyphicon glyphicon-phone-alt"></i>Служба поддержки: 8 (926) 671-72-90</p>
                <p><i class="glyphicon glyphicon-envelope"></i>E-mail: i_a.pichuev@mpt.ru</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 copy">
                <p>© Магазин компьютерной техники МКТ - 2018</p>
            </div>
        </div>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
