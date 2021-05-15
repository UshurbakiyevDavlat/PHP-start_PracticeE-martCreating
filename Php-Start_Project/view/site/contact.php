
<?php include "view/layouts/header.php";?>

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
                <h2>Обратная связь</h2>
                <form action="index.php/site/contact" method="post">
                    <input type = "email" name = "email" placeholder="E-mail" value="">
                    <input type = "text" name = "message" placeholder="Message" value="">
                    <button type = "submit" name = "submit" class = "btn btn-default">Обратиться</button>
                </form>
            </div>

            <br/>
            <br/>
        </div>
    </div>
</div>


</section>

<?php include "view/layouts/footer.php";?>
