
<?php if(!empty($session['cart'])):?>
    <div class="table-responsive">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr class="cart_prod_head">
                            <th>Товар</th>
                            <th>Наименование</th>
                            <th>Кол-во</th>
                            <th>Стоимость</th>
                            <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                        </tr>
                    </thead>
                   <tbody>
                   <?php foreach ($session['cart'] as $id => $item): ?>
                       <tr class="cart_prod_content">
                           <td class="img_cart"><img src="../images/<?= $item['img'];?>"></td>
                           <td class="title_cart"><?= $item['name'];?></td>
                           <td class="value_cart"><?= $item['qty'];?></td>
                           <td class="price_cart"><?= number_format($item['price'], 0, '.', ' ');?> руб</td>
                           <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                       </tr>
                   <?php endforeach;?>
                   <tr class="cart_prod_footer">
                       <td colspan="3" class="rez_title_cart">Итого товаров:</td>
                       <td colspan="2" class="rez_price_cart"><?= $session['cart.qty'];?></td>
                   </tr>
                   <tr class="cart_prod_footer">
                       <td colspan="3" class="rez_title_cart">На сумму:</td>
                       <td colspan="2" class="rez_price_cart"><?= number_format($session['cart.sum'], 0, '.', ' ');?> руб</td>
                   </tr>
                   </tbody>
                </table>
            </div>
        </div>
    <?php else:?>
    <h3>Корзина пуста</h3>
<?php endif;?>
