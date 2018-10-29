<p>Вы ввели информацию:</p>
<p>Имя: <?= $model->name ?></p>
<p>Почта: <?= $model->email ?></p>
<p>Пароль: <?= md5($model->pass) ?></p>
<p>Пароли совпадают ? -
    <?php if (($model->pass) == ($model->confpass))
{  echo ('Да, совпадают');}
else { echo ('Нет, не совпадают');  } ?></p>