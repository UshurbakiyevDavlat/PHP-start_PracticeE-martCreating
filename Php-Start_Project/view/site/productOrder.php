<?php include "view/layouts/header.php";?>
<section>
    <div class="container">
        <div class="row">

            <div class = "col-sm-4 col-sm-offset-4 padding-right">
                <?php if($result):
                echo "Ваш заказ отправлен! Ожидайте звонка оператора.";
                ?>
                <?php else :?>
                <?php if(isset($errors)):?>
                <?php foreach ($errors as $error):?>
                        <?php echo "<li>" . $error . "</li>";?>
                <?php endforeach;?>
            <?php endif;?>

<!--                --><?php echo "Итак вы добавили в корзину: "
                    .$_SESSION['totalAmountProd']." товаров на сумму: "
                    .$_SESSION['totalSum']."$";?>
                <div class = "signup-form">
                    <h2>Форма заказа</h2>
                    <form action="index.php/cart/makeOrder" method="post">
                        <input type = "text" name = "name" placeholder="Name" value="<?php
                       if(isset($userName)) echo $userName;
                       ?>">
                        <input type = "text" name = "phone" placeholder="phone" value="">
                        <input type = "text" name = "commentary" placeholder="Commentary" value="">
                        <button type = "submit" name = "submit" class = "btn btn-default">Оформить</button>
                    </form>
                </div>
                    <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>


</section>

<?php include "view/layouts/footer.php";?>
