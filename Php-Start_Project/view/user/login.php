
<?php include ROOT."/view/layouts/header.php";?>
<section>
    <div class="container">
        <div class="row">
            <div class = "col-sm-4 col-sm-offset-4 padding-right">

                    <ul>
                        <?php
                        if(isset($errors) && is_array($errors)) {
                            foreach ($errors as $error) {
                                echo "<li>-" . $error . "</li>";
                            }
                        }
                        ?>
                    </ul>



                    <div class = "signup-form">
                        <h2>Авторизация</h2>
                        <form action="index.php/user/login" method="post">
                            <input type = "email" name = "email" placeholder="E-mail" value="">
                            <input type = "password" name = "password" placeholder="Password" value="">
                            <button type = "submit" name = "submit" class = "btn btn-default">Авторизация</button>
                        </form>
                    </div>

                <br/>
                <br/>
            </div>
        </div>
    </div>


</section>


<?php include  ROOT."/view/layouts/footer.php";?>
