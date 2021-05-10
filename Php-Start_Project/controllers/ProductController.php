<?php
//    include  ROOT."/models/Product.php";
//    include ROOT."/models/Category.php";

    class ProductController {
        public function actionView($id) {
            $categories = Category::getCategoryList();

            $product = Product::getProductById($id);
            require_once(ROOT.'/view/product/view.php');
            return true;
        }
    }