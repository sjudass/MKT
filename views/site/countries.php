<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<table class="table table-hover table-striped table-bordered">
<thead class="table-active" style="background-color: #337ab7; color: snow">
<tr>
    <th>Код</th>
    <th>Имя</th>
    <th>Численность</th>
</tr>
</thead>
<?php foreach ($countries as $country): ?>
<tr>
    <td><?= $country->code; ?></td>
    <td><?= $country->name; ?></td>
    <td><?= $country->population; ?></td>
</tr>
<?php endforeach; ?>

    <?php $form = ActiveForm::begin();;?>
    <tr>
        <td><?=$form->field($newcountry, 'code'); ?></td>
        <td><?=$form->field($newcountry, 'name'); ?></td>
        <td><?=$form->field($newcountry, 'population'); ?></td>
    </tr>
</table>
<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-lg btn-block']);?>
</div>

<?php ActiveForm::end() ?>