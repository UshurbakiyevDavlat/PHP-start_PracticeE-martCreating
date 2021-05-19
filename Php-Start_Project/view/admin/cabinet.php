<?php  require_once 'view/layouts/header_admin.php';?>

<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <h1>Добрый день администратор!</h1>
            <h2>Вам доступны такие возможности как: </h2>
            <div class="col-sm-8">
                <ul>
                    <li><a href="index.php/aProd/index">Управление товарами</a></li>
                    <li><a href="index.php/aCat/index">Управление категориями</a></li>
                    <li><a href="index.php/aOrder/index">Управление заказами</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php  require_once 'view/layouts/footer_admin.php';?>
