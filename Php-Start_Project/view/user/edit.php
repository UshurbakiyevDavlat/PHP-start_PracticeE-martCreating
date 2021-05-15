
<?php include ROOT."/view/layouts/header.php";?>

<section>
    <div class="container">
        <div class="row">
            <div class = "col-sm-4 col-sm-offset-4 padding-right">
                <?php if (isset($result)&&$result) echo "Данные успешно обновленны.";?>
                <div class = "signup-form">
                    <h2>Редактирование данных пользователя</h2>
                    <form action="index.php/user/edit" method="post">
                        <input type = "text" name = "name" placeholder="Name" value="<?php echo $user['name']?>">
                        <input type = "email" name = "email" placeholder="E-mail" value="<?php echo $user['email']?>">
                        <input type = "password" name = "password" placeholder="Password" value="<?php echo $user['password']?>">
                        <button type = "submit" name = "submit" class = "btn btn-default">Обновление</button>
                    </form>
                </div>
                <br/>
                <br/>
            </div>
        </div>
    </div>


</section>
<?php include  ROOT."/view/layouts/footer.php";?>

