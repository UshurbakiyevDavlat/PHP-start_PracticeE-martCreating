
<?php include "view/layouts/header.php";?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem):?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="index.php/category/<?php echo $categoryItem['id'];?>"
                                           class = "<?php if ($categoryItem['id'] == $category_id) echo "active";?>"
                                        >
                                            <?php echo $categoryItem['name'];?>

                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu">
                                <td class="image">Фотография Товара</td>
                                <td class="description">Описание Товара</td>
                                <td class="price">Цена</td>
                                <td class="quantity">Качество</td>
                                <td class="total">Сумма</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $total = 0; $i=0; if(isset($cartInfo)):foreach ($cartInfo as $cartItem):?>

                            <tr>
                                <td class="cart_product">
                                    <a href="index.php/products/<?php echo $cartItem[0]['id'];?>">><img src="template/images/cart/one.png" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="index.php/products/<?php echo $cartItem[0]['id'];?>"><?php echo $cartItem[0]['name']?></a></h4>
                                    <p>Web ID: <?php echo $cartItem[0]['code']?></p>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo $cartItem[0]['price']?> $</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href=""> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $cartValues[$i];?>" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href=""> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?php $total += $cartItem[0]['price'] * $cartValues[$i];
                                    echo $cartItem[0]['price'] * $cartValues[$i]?> $</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <?php $i++; endforeach; endif;
                            ?>
                            </tbody>
                        </table>
                        <td class="cart_total">
                            <p class="cart_total_price"><h1><?php echo "Итог:".$total; ?></h1></p>
                        </td>
                        <a href="index.php/cart/makeOrder" class="btn btn-default"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>

                    </div>
        </div>
</section>

<br>

<?php include "view/layouts/footer.php";?>

