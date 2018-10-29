<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
<?=$form->field($model, 'name'); ?>
<?=$form->field($model, 'email');?>
<?=$form->field($model, 'pass')->passwordInput(); ?>
<?=$form->field($model, 'confpass')->passwordInput();?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']);?>
    </div>

<?php ActiveForm::end() ?>