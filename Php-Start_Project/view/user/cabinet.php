
<?php include ROOT."/view/layouts/header.php";?>

<section>
    <div class="container">
        <div class="row">

            <h1>Кабинет пользователя</h1>

            <h3>Привет, <?php echo $user['name'];?>!</h3>
            <ul>
                <li><a href="index.php/user/edit">Редактировать данные</a></li>
                <li><a href="index.php/user/history">Список покупок</a></li>
            </ul>

        </div>
    </div>
</section>
<?php include  ROOT."/view/layouts/footer.php";?>


