<?php

        include_once ROOT."/models/Category.php";
        include  ROOT."/models/Product.php";

    class SiteController {
        public  function actionIndex(){
            $categories = array();
            $categories = Category::getCategoryList();

            $latestProd = [];
            $latestProd = Product::getLatestProducts(6);

            require_once (ROOT.'/view/site/index.php');
            return true;
        }
    }