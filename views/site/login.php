<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="col-lg-4 col-md-6">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для входа:</p>
    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif;?>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'login')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>


        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary',  'name' => 'login-button', 'style' => 'width: 100px']) ?>
        <?= Html::a('Регистрация', '/site/register', ['class' => 'btn btn-primary', 'name' => 'register-button' , 'style' => 'width: 160px']) ?>

        <?php ActiveForm::end(); ?>
    </div>

</div>
