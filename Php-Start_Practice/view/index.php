<?php


        // Format: Month:05,Day:06,Year:2021

    //    $string = '05.06.2021';
    //    $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
    //    $replacement = 'Month:$1,Day:$2,Year:$3';
    //   echo  preg_replace($pattern,$replacement,$string);

    //Font controller

    //1 Basic config
        ini_set('display_errors',1);
        error_reporting(E_ALL);

    //2 Connect files of the system
        define('ROOT',dirname(__DIR__));
        require_once(ROOT . '/components/Router.php');

   //3 Connect DB

        require_once(ROOT . '/components/Db.php');

    //4 Calling Router
        $router = new Router();
        $router->run();
