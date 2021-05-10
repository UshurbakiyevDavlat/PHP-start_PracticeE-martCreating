<?php
//Font controller

//1 Basic config
ini_set('display_errors',1);
error_reporting(E_ALL);

//2 Connect files of the system
define('ROOT',dirname(__FILE__));
require_once (ROOT.'/components/Autoload.php');
//require_once(ROOT . '/components/Router.php');

//3 Connect DB

//require_once(ROOT . '/components/Db.php');

//4 Calling Router
$router = new Router();
$router->run();