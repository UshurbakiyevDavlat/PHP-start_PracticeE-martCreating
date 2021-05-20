<?php
class AdminOrderController{
    public function actionIndex(){
        $orders = Order::getOrdersList();

            require_once 'view/admin/orderIndex.php';
            return true;
    }

    public function actionOrdUpd($id){
        $order = Order::getOrderById($id);
         if (isset($_POST['submit'])) {

             $options['userName'] = $_POST['userName'];
             $options['userPhone'] = $_POST['userPhone'];
             $options['userComment'] = $_POST['userCommentary'];
             $options['Products'] = $_POST['Products'];
             $options['user_id'] = $_POST['user_id'];
             $options['date_of_an_order'] = $_POST['date_of_an_order'];


             Order::ordUpd($id,$options);
             header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aOrder");
         }
        require_once "view/admin/orderUpdate.php";
        return true;
    }

    public function actionOrdDel($id){
        if (isset($_POST['yes'])) {
            Order::orderDelete($id);
            header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aOrder");
        } elseif(isset($_POST['no'])) {
            header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aOrder");
        }
        require_once  'view/admin/orderDel.php';
        return true;
    }
}