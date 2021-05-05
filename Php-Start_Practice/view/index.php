<?php
    //Font controller

    //1 Basic config
        ini_set('display_errors',1);
        error_reporting(E_ALL);

    //2 Connect files of the system
        define('ROOT',dirname(__DIR__));
        require_once (ROOT.'/components/Router.php');

   //3 Connect DB



    //4 Calling Router
        $router = new Router();
        $router->run();
