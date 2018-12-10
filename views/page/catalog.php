<?php
use yii\helpers\Url;
$this->title = 'Каталог';
?>
<div class="row">
    <div class="col-lg-12 contant_wrap">
        <div class="navigation">
            <ul>
                <li><a href="/site/index"><i class="glyphicon glyphicon-home"></i></a></li>
                <li><span>Каталог</span></li>
            </ul>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 catalog">
    <div class="row content">
        <?php foreach ($categories as $category):?>
        <div class="col-lg-3 col-md-6 col-sm-43 col-xs-12 catalog_category">
            <a href="<?=Url::toRoute(['page/listproducts', 'id' => $category['id']]);?>"><img src="../images/<?php echo $category['img'];?>"></a>
            <a href="<?=Url::toRoute(['page/listproducts', 'id' => $category['id']]);?>"><?php echo $category['name'];?></a>
        </div>
        <?php endforeach;?>
    </div>
</div>
