<?php
//    include  ROOT."/models/Product.php";
//    include ROOT."/models/Category.php";

    class ProductController {
        public function actionView($id) {
            $categories = Category::getCategoryList();

            $product = Product::getProductById($id);

            $path ="view/upload/images/products/{$id}.jpg";
            $altImg = "view/upload/images/products/АльтРубашка.jpg";

            require_once(ROOT.'/view/product/view.php');
            return true;
        }
    }