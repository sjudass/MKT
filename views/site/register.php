<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для регистрации:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($user, 'login')->textInput(['autofocus' => true]) ?>

    <?= $form->field($user, 'password')->passwordInput() ?>

    <?= $form->field($user, 'confpass')->passwordInput() ?>

    <?= $form->field($user, 'username')->textInput() ?>

    <?= $form->field($user, 'user_surname')->textInput() ?>

    <?= $form->field($user, 'email')->textInput() ?>

    <?= $form->field($user, 'phone')->textInput() ?>

    <?= $form->field($user, 'region')->textInput() ?>

    <?= $form->field($user, 'city')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
            <?= Html::a('Вход', '/site/login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'style' => 'width: 100px']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>