<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для регистрации:</p>

    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif;?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'login')->textInput(['autofocus' => true]) ?>

    <?= $form->field($user, 'password')->passwordInput() ?>

    <?= $form->field($user, 'confpass')->passwordInput() ?>

    <?= $form->field($user, 'email')->textInput() ?>

        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
            <?= Html::a('Вход', '/site/login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style' => 'width: 100px']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>