
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

            <div id="contact-page" class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="contact-info">
                            <h2 class="title text-center">Contact Info</h2>
                            <address>
                                <p>Baganashil TOO.</p>
                                <p>13a Sanatorniy Baganashil Almaty, IL 0000319500043, KZ</p>
                                <p>ALMATY KZ</p>
                                <p>Mobile: +8 747 778 28 77</p>
                                <p>Email: dushurbakiev@gmail.com</p>
                            </address>
                            <div class="social-networks">
                                <h2 class="title text-center">Social Networking</h2>
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
