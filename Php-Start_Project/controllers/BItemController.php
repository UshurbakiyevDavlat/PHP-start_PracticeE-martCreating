<?php
class BItemController {
    function actionItem ($id){
        $categories = Category::getCategoryList();
        $newsItem = Blog::getArticleById($id);
        require_once 'view/blog/blogItem.php';
        return true;
    }
}