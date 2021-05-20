
<?php  require_once 'view/layouts/header_admin.php';?>

<section>

    <div class="container">

        <br>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="">ID</td>
                    <td class="">UserName</td>
                    <td class="">UserPhone</td>
                    <td class="">UserCommentary</td>
                    <td class="">OrderList</td>
                    <td class="">UserID</td>
                    <td class="">Date of an Order</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>

                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td>
                            <?php echo $order['id'];?>
                        </td>

                        <td>
                            <?php echo $order['userName'];?>
                        </td>

                        <td>
                            <?php echo $order['userPhone']; ?>
                        </td>
                        <td>
                            <?php echo $order['userComment']; ?>
                        </td>

                        <td>
                            <?php

                            $prodArr = json_decode($order['Products']);
                            $id = '';
                            $amount = '';


                            foreach ($prodArr as $key=>$prod){
                                $id = $key;
                                $amount = $prod;

                                $ordProd = Product::getProductById($id);
                                echo $ordProd['name']." - ".$amount." штук<br>";
                            }

                            ?>
                        </td>
                        <td>
                            <?php echo $order['user_id']; ?>
                        </td>
                        <td>
                            <?php echo $order['date_of_an_order']; ?>
                        </td>

                        <td><a href = "index.php/OrderUpd/<?php echo $order['id'];?>">Редактировать</a></td>
                        <td><a href = "index.php/OrderDel/<?php echo $order['id'];?>">Удалить</a></td>
                    </tr>

                <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</section>


<?php  require_once 'view/layouts/footer_admin.php';?>
