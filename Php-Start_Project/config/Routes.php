<?php
    return array (
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/catalog'=>'catalog/index',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/products/([0-9]+)'=>'product/view/$1',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/category/([0-9]+)'=>'catalog/category/$1',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/user/register'=>'user/register',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/user/login'=>'user/login',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/user/unlogin'=>'user/unlogin',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/user/cabinet'=>'user/cabinet',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/user/edit'=>'user/edit',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/site/contact'=>'site/contact' ,
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/cart/addToCart/([0-9]+)'=>'cart/addtocart/$1',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/cart/getcart'=>'cart/getcart',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/cart/makeOrder'=>'cart/makeOrder',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php/cart/addAjax/([0-9]+)'=>'cart/addAjax/$1',
        'PHP-start_PracticeE-martCreating/Php-Start_Project/index.php'=>'site/index',//actionIndex in SiteController
    );