<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
                <a href="/"><img src="../../images/logo.png"></a>
            </div>
            <div class="btn_top_wrap col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="btn_and_search">
                    <div class="btn_top">
                        <?php if (Yii::$app->user->isGuest): ?>
                            <a href="<?=Url::toRoute('site/login');?>"><i class="glyphicon glyphicon-log-in"></i>Войти</a>
                            <a href="<?=Url::toRoute('site/register');?>"><i class="glyphicon glyphicon-pencil"></i>Зарегистрироваться</a>
                        <?php else: ?>
                            <form method="post" action="/site/logout">
                                <?php if (Yii::$app->user->identity['isAdmin'] > 0): ?>
                                    <a href="<?=Url::toRoute('/site/index');?>"><i class="glyphicon glyphicon-home"></i>Магазин</a>
                                <?php endif;?>
                                <?= Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []);?>
                                <button type="submit" style="color:white; background-color: inherit; border: none"><a><i class="glyphicon glyphicon-log-out"></i>Выйти</a></button>
                            </form>
                        <?php endif;?>
                    </div>
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
                        ['label' => 'Главная', 'url' => ['/admin']],
                        ['label' => 'Список категорий', 'url' => ['/admin/categories/index']],
                        ['label' => 'Добавление категории', 'url' => ['/admin/categories/create']],
                        ['label' => 'Товары', 'url' => ['/admin/products/index']],
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
        <?php if(Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo Yii::$app->session->getFlash('success');?>
            </div>
        <?php endif;?>

        <?=$content;?>
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
                        <li><a href="<?=Url::toRoute('page/listproducts?id=1');?>">Ноутбуки</a></li>
                        <li><a href="<?=Url::toRoute('page/listproducts?id=2');?>">Компьютеры</a></li>
                        <li><a href="<?=Url::toRoute('page/listproducts?id=3');?>">Смартфоны</a></li>
                        <li><a href="<?=Url::toRoute('page/listproducts?id=5');?>">Приставки</a></li>
                    </ul>
                </div>
                <div class="footer_menu">
                    <h3>Информация</h3>
                    <ul>
                        <li><a href="<?=Url::toRoute('page/delivery');?>">Доставка</a></li>
                        <li><a href="<?=Url::toRoute('page/payment');?>">Оплата</a></li>
                        <li><a href="<?=Url::toRoute('page/about');?>">О компании</a></li>
                        <li><a href="<?=Url::toRoute('page/discounts');?>">Скидки</a></li>
                    </ul>
                </div>
                <div class="footer_menu">
                    <h3>Учетная запись</h3>
                    <ul>
                        <li><a href="<?=Url::toRoute('page/login');?>">Войти</a></li>
                        <li><a href="#">Зарегистрироваться</a></li>
                        <li><a href="#">Мои заказы</a></li>
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
