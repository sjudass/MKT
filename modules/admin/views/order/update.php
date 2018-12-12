<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Update Order: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Внести изменения';
?>
<div class="order-update">

    <h1>Редактирование заказа №<?= $model->id ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
