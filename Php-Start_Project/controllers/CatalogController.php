<?php
    include ROOT."/models/Category.php";
    include ROOT."/models/Product.php";

    class CatalogController {
        public  static function actionIndex(){
            $categories = Category::getCategoryList();
            $latestProd = Product::getLatestProducts(12);
            include ROOT."/view/catalog/index.php";
            return true;
        }

        public static function actionCategory($category_id) {
                $categories = Category::getCategoryList();
                $categoryProd = Product::getProductsListByCategory($category_id);
                require_once ROOT."/view/catalog/category.php";
                return true;

        }
    }