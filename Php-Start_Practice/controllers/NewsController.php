<?php
    require_once ROOT.'/models/News.php';
    class NewsController {
        public  function  actionIndex (): bool
        {

            $newsList = News::getNewsList();

            echo "<pre>";
            print_r($newsList);
            echo "</pre>";

            echo "actionIndex";
            return true;
        }
        public function actionView($id): bool
        {
            if ($id) {
                $newsItem = News::getNewsItemById($id);

                echo "<pre>";
                print_r($newsItem);
                echo "</pre>";

                echo "actionView";
            }
            return true;
        }
    }