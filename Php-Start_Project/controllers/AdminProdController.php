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

            Product::addProduct($options);

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
        $options = [];
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

        Product::updateProduct($id,$options);

//                foreach ($options as $option){
//                    echo $option."<br>";
//                }


            }
        require_once 'view/admin/prodUpdate.php';
        return true;
    }

    public function actionDelete($id){

        Product::deleteProduct($id);
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
}