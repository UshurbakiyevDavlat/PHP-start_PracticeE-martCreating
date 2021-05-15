
<?php include ROOT."/view/layouts/header.php";?>
<section>
    <div class="container">
        <div class="row">
            <div class = "col-sm-4 col-sm-offset-4 padding-right">
                <?php

                if(isset($result) && $result):
                    ?>
                <p> "Вы успешно зарегестрированны"</p>
                <?php else: ?>

                       <ul>
                           <?php
                           if(isset($errors)) {
                               foreach ($errors as $error) {
                                   echo "<li>-" . $error . "</li>";
                               }
                           }
                                ?>
                        </ul>



                <div class = "signup-form">
                    <h2>Регистрация</h2>
                    <form action="index.php/user/register" method="post">
                        <input type = "text" name = "name" placeholder="Name" value="<?php if (isset($name))echo $name?>">
                        <input type = "email" name = "email" placeholder="E-mail" value="<?php  if (isset($email))echo $email?>">
                        <input type = "password" name = "password" placeholder="Password" value="<?php if (isset($pass))
                            echo $pass?>">
                        <button type = "submit" name = "submit" class = "btn btn-default">Регистрация</button>
                    </form>
                </div>
                <?php endif;?>
                <br/>
                <br/>
            </div>
        </div>
    </div>


</section>


<?php include  ROOT."/view/layouts/footer.php";?>
