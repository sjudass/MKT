<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Просмотр заказа №<?= $model->id ?></h1>

    <p>
        <?= Html::a('Внести изменения', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот элемент ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">Активен</span>' :
                '<span class="text-success">Завершен</span>',
                'format' => 'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <?php $items = $model->orderItems;?>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr class="cart_prod_head">
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Стоимость</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item):?>
                <tr class="cart_prod_content">
                    <td class="title_cart"><a href="<?=Url::toRoute(['/page/product', 'id' => $item['product_id']]);?>"><?= $item['name'];?></a></td>
                    <td class="value_cart"><?= $item['qty_item'];?></td>
                    <td class="price_cart"><?= number_format($item['price'], 0, '.', ' ');?> руб</td>
                    <td class="price_cart"><?= number_format($item['sum_item'], 0, '.', ' ');?> руб</td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
