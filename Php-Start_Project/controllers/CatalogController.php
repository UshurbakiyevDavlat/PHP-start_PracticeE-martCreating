<?php
//    include ROOT."/models/Category.php";
//    include ROOT."/models/Product.php";
//    include ROOT."/components/Pagination.php";

    class CatalogController {
        public  static function actionIndex(){
            $categories = Category::getCategoryList();
            $latestProd = Product::getLatestProducts(12);
            $altImg = "view/upload/images/products/АльтРубашка.jpg";
            include ROOT."/view/catalog/index.php";
            return true;
        }

        public static function actionCategory($category_id,$page=1) {

                $categories = Category::getCategoryList();
                $categoryProd = Product::getProductsListByCategory($category_id,$page);

                $total = Product::getTotalProductsToCategory($category_id);

                $pagination = new Pagination($total,$page,Product::SHOW_BY_DEFAULT,'page-');
            $altImg = "view/upload/images/products/АльтРубашка.jpg";
                require_once ROOT."/view/catalog/category.php";
                return true;

        }
    }