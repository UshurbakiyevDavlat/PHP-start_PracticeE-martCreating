<?php

//        include_once ROOT."/models/Category.php";
//        include  ROOT."/models/Product.php";

    class SiteController {
        public  function actionIndex(){
            $categories = array();
            $categories = Category::getCategoryList();

            $latestProd = [];
            $latestProd = Product::getLatestProducts(6);

            require_once (ROOT.'/view/site/index.php');
            return true;
        }

        public function actionContact(){

                $adminEmail = "dushurbakiev@gmail.com";
                $clientEmail = isset($_POST['email'])??$_POST['email'];
                $topic = "Some problem ".$clientEmail;
                $text = "Test message for admin, to check if it is working correctly.";

                $result = false;
                $errors = false;
                    if (isset($_POST['submit'])) {
                        if (!User::checkEmail($clientEmail) && !empty($clientEmail)) {
                            $errors [] = "Не верный email.";
                        }
                        if (empty($text)) {
                            $errors[] = "Пустое сообщение";
                        }

                        if ($errors == false) {
                            mail($adminEmail, $topic, $text);
                            $result = true;
                        }
                    }

            require_once (ROOT.'/view/site/contact.php');
            return true;

        }
    }