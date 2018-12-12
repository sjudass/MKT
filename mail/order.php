 <div class="table-responsive">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <table style="width: 100%; border: 1px solid #ddd; border-collapse: collapse">
                <thead>
                <tr style="background: #f9f9f9">
                    <th style="padding: 8px; border: 1px solid #ddd;">Наименование</th>
                    <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
                    <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
                    <th style="padding: 8px; border: 1px solid #ddd;">Стоимость</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($session['cart'] as $id => $item): ?>
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['name'];?></td>
                        <td style="padding: 8px; border: 1px solid #ddd;"><?= $item['qty'];?></td>
                        <td style="padding: 8px; border: 1px solid #ddd;"><?= number_format($item['price'], 0, '.', ' ');?> руб</td>
                        <td style="padding: 8px; border: 1px solid #ddd;"><?= number_format($item['price'] * $item['qty'], 0, '.', ' ');?> руб</td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">Итого товаров:</td>
                    <td colspan="2" style="padding: 8px; border: 1px solid #ddd;"><?= $session['cart.qty'];?></td>
                </tr>
                <tr>
                    <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">На сумму:</td>
                    <td colspan="2" style="padding: 8px; border: 1px solid #ddd;"><?= number_format($session['cart.sum'], 0, '.', ' ');?> руб</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>