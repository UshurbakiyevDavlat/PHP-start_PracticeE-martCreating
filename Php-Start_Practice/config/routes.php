<?php
return array (
//    'news' => 'news/index',
//    'products' => 'product/list',
//    'news/archive'=> 'news/archive',
//    'article' => 'article/index'
//        'news/{[0-9]+}'=>'news/view'
    "PHP-start_PracticeE-martCreating/Php-Start_Practice/view/news/view.php/([0-9]+)"=>'news/view/$1', //([a-z]+)
    "PHP-start_PracticeE-martCreating/Php-Start_Practice/view/index.php/news"=>'news/index',
);
