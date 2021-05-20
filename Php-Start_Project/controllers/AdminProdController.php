<?php
class AdminProdController {
    public function actionIndex (){
        $products = Product::getProducts();

            require_once 'view/admin/prodIndex.php';
            return true;
    }


    public function actionAddProd(){
        $categories = Category::getCategoryList();
        $options = [];
        $altImg = "view/upload/images/products/АльтРубашка.jpg";

        $Prods = Product::getProducts();
        $id = 0;
        foreach ($Prods as $prod){
            $id = $prod['id'];
        }
        if (isset($_POST['submit'])) {

            $options['article'] = $_POST['article'];
            $options['name'] = $_POST['name'];
            $options['avail'] = $_POST['availability'];
            $options['category'] = $_POST['category'];
            $options['price'] = $_POST['price'];
            $options['brand'] = $_POST['brand'];
            //$options['image'] = $_POST['image'];
            $options['description'] = $_POST['description'];
            $options['new'] = $_POST['new'];
            $options['rec'] = $_POST['rec'];
            $options['hid'] = $_POST['hid'];

            $id++;
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                move_uploaded_file($_FILES['image']['tmp_name'],
               ROOT."/view/upload/images/products/{$id}.jpg");
                $path ="view/upload/images/products/{$id}.jpg";
            }


            Product::addProduct($options);

            header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aProd");

//                foreach ($options as $option){
//                    echo $option."<br>";
//                }


        }
        require_once 'view/admin/prodAdd.php';
        return true;
    }
    public function actionUpdate($id){

        $categories = Category::getCategoryList();
        $product = Product::getProductById($id);

        $path ="view/upload/images/products/{$id}.jpg";
        $altImg = "view/upload/images/products/АльтРубашка.jpg";
        echo $path;

        $options = [];
            if (isset($_POST['submit'])) {

                $options['article'] = $_POST['article'];
                $options['name'] = $_POST['name'];
                $options['avail'] = $_POST['availability'];
                $options['category'] = $_POST['category'];
                $options['price'] = $_POST['price'];
                $options['brand'] = $_POST['brand'];
                $options['description'] = $_POST['description'];
                $options['new'] = $_POST['new'];
                $options['rec'] = $_POST['rec'];
                $options['hid'] = $_POST['hid'];

                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    move_uploaded_file($_FILES['image']['tmp_name'],
                        ROOT."/view/upload/images/products/{$id}.jpg");
                }
        Product::updateProduct($id,$options);
                header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aProd");

//                foreach ($options as $option){
//                    echo $option."<br>";
//                }


            }
        require_once 'view/admin/prodUpdate.php';
        return true;
    }

    public function actionDelete($id)
    {
        if (isset($_POST['yes'])) {
            Product::deleteProduct($id);
            header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aProd");
        } elseif(isset($_POST['no'])) {
            header("Location:/PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/aProd");
        }
        require_once 'view/admin/prodDel.php';
        return true;
    }
}