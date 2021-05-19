<?php
class AdminController extends AdminBase {
    public function actionShow(){
        $user = $_SESSION['user'];
        if (isset($user)){
            if (!AdminBase::checkAdminRight($user)){
                die("Permission denied");
            }
        } else {
           header("Location:user/login");
        }
        include_once 'view/admin/cabinet.php';
        return true;
    }
}