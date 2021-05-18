<?php
    class CartController {

        public function actionAddtocart($id){
            $id = intval($id);
                $cartProds = Cart::addCart($id);
                $originPath = $_SERVER['HTTP_REFERER'];
                header("Location:"."$originPath");

        }

        public function actionGetcart(){
            $categories = Category::getCategoryList();
            if (isset( $_SESSION['prodArray'])) {

                $cartProducts = $_SESSION['prodArray'];
                $cartKeys = array_keys($cartProducts);
                $cartValues = array_values($cartProducts);

                $i = 0;
                foreach ($cartKeys as $cartKey) {
                    $cartInfo[$i] = Cart::getInfo($cartKey);
                    $i++;
                }
            }
            require_once ROOT."/view/site/cart.php";
            return true;
        }

        public function actionAddAjax($id){
                echo  Cart::addCart($id);
                return true;
        }

        public function actionMakeOrder(){

            $result = false;

            if(isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $comment = $_POST['commentary'];
                    $errors = false;


                    if (!User::checkName($name)){
                        $errors[] = "Имя должно быть более одного символа";
                        }
                    if (!User::checkPhone($phone)){
                        $errors[] = "Не правильный номер!";
                    }
                    if(!User::checkCommentary($comment)){
                        $errors[] = "Короткий комментарий.Укажите больше информации.";
                    }
                    if ($errors == false) {
                        $result = true;


                        $produtcO = json_encode($_SESSION['prodArray']);
                        $userId = "";
                        if (isset($_SESSION['user'])) $userId = $_SESSION['user'];
                        Order::save($name,$phone,$comment,$produtcO,$userId);
                        Cart::clear();

//                        $adminEmail = "dushurbakiev@gmail.com";
//                        $topic = "New Order.";
//                        $text = "http://localhost/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/order/$userId";
//                        //mail($adminEmail, $topic, $text);
//                        echo $adminEmail.$topic.$text;
                    }

            } else {
                if (isset($_SESSION['prodArray'])) {
                    $total = Cart::getTotalSum();
                    $amount = Cart::getAmount();

                    $_SESSION['totalSum'] = $total;
                    $_SESSION['totalAmountProd'] = $amount;

                    if (User::checkAuth()) {
                        $userInfo = User::getUserbyId();
                        $userName = $userInfo['name'];

                    }

                } else {
                    header("Location:index.php");
                }
            }

            require_once ROOT."/view/site/productOrder.php";
            return true;

        }

        public function actionDelete($id){
             unset($_SESSION['prodArray'][$id]);
             header("Location:".$_SERVER['HTTP_REFERER']);
        }
        public function actionPlus($id){
            $_SESSION['prodArray'][$id]++;
            header("Location:".$_SERVER['HTTP_REFERER']);
        }

        public function actionMinus($id){
            $_SESSION['prodArray'][$id]--;
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
    }