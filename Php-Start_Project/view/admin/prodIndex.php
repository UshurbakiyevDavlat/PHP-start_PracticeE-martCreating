<?php  require_once 'view/layouts/header_admin.php';?>

<section>

    <div class="container">
        <div>
            <h3><a href="index.php/aAdd">Добавить продукт</a></h3>
        </div>
        <br>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="">ID</td>
                    <td class="">Article</td>
                    <td class="">Name</td>
                    <td class="">Price</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>

                </thead>
                <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <?php echo $product['id'];?>
                    </td>

                    <td>
                        <?php echo $product['code'];?>
                    </td>

                    <td>
                        <?php echo $product['name'];?>
                    </td>

                    <td>
                        <?php echo $product['price'];?>
                    </td>

                    <td><a href = "index.php/aUpdate/<?php echo $product['id'];?>">Редактировать</a></td>
                    <td><a href = "index.php/aDelete/<?php echo $product['id'];?>">Удалить</a></td>
                </tr>

            <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

</section>


<?php  require_once 'view/layouts/footer_admin.php';?>
