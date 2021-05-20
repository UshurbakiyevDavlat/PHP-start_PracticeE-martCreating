<?php
class AdminCatController{
    public function actionIndex(){
        $categories = Category::getCategoryList();
        require_once 'view/admin/catIndex.php';
        return true;
    }

    public function actionCatAdd(){
            $options = [];
            if (isset($_POST['submit'])) {
                $options['name'] = $_POST['name'];
                $options['sort_order'] = $_POST['sort_order'];
                $options['hid'] = $_POST['hid'];
                Category::addCategory($options);
                header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aCat");
            }

        require_once 'view/admin/catAdd.php';
        return true;
    }

    public function actionCatUpd($id){
        $categories = Category::getCategoryById($id);
        $options = [];
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['hid'] = $_POST['hid'];

            Category::updateCategory($id,$options);
            header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aCat");
        }
        require_once 'view/admin/catUpd.php';
        return true;
    }

    public function actionCatDel($id){
        if (isset($_POST['yes'])) {
            Category::deleteCategory($id);
            header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aCat");
        } else if (isset($_POST['no'])) {
            header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aCat");
        }
       require_once 'view/admin/catDel.php';


        return true;
    }
}