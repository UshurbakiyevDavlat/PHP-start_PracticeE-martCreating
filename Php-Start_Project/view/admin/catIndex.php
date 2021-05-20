
<?php  require_once 'view/layouts/header_admin.php';?>

<section>

    <div class="container">
        <div>
            <h3><a href="index.php/CatAdd">Добавить категорию</a></h3>
        </div>
        <br>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="">ID</td>
                    <td class="">Name</td>
                    <td class="">Sort-order</td>
                    <td class="">Status</td>
                    <td>Редактировать</td>
                    <td>Удалить</td>
                </tr>

                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td>
                            <?php echo $category['id'];?>
                        </td>

                        <td>
                            <?php echo $category['name'];?>
                        </td>

                        <td>
                            <?php echo $category['sort_order']; ?>
                        </td>

                        <td>
                            <?php if ($category['status']==1)echo "Не скрыто";else echo "Скрыто";?>
                        </td>

                        <td><a href = "index.php/CatUpd/<?php echo $category['id'];?>">Редактировать</a></td>
                        <td><a href = "index.php/CatDel/<?php echo $category['id'];?>">Удалить</a></td>
                    </tr>

                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>

</section>


<?php  require_once 'view/layouts/footer_admin.php';?>
