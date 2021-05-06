<?php
    require_once ROOT.'/models/News.php';
    class NewsController {

        public  function  actionIndex ()
        {

            $newsList = News::getNewsList();

            echo "<pre>";
            print_r($newsList);
            echo "</pre>";

            echo "actionIndex";
            return true;
        }
        public function actionView($id)
        {
            if ($id) {

                return News::getNewsItemById($id);
            }
            return true;
        }
    }