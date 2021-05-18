<?php

class  BlogController {
    function actionArticle($page = 1){
        $categories = Category::getCategoryList();
        $news = Blog::getNews($page);
        $total = Blog::getTotalAtricles();

        $pagination = new Pagination($total,$page,Blog::SHOW_BY_DEFAULT,'page-');

        require_once 'view/blog/blog.php';
        return true;
    }
}