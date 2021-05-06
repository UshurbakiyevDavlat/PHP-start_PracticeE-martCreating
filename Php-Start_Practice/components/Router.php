<?php
    class Router
    {
        private $routes;

        function __construct()
        {
            $routesPath = ROOT.'/config/routes.php';
            $this->routes = include($routesPath);
        }


        /**
         * Returns request string
         * @return string
         */
        private function  getUri() {
                if (!empty($_SERVER['REQUEST_URI'])) {
                    return trim($_SERVER['REQUEST_URI'],'/');
                }return -1;
        }

        function run()
        {
            // Get s string of the query
            $uri = $this->getUri();
//            echo $uri."<br>";
            //Check if this query in the routes.php
            foreach ($this->routes as $uriPattern => $path) {
                // Check for the pattern define which controller and action deal with query
//                echo $uriPattern."<br>";

                    if (preg_match("~$uriPattern~",$uri)){
                        $internalRoute = preg_replace("~$uriPattern~",$path,$uri);
//                        echo "$path<br>";
//                        echo "$uri<br>";
                        $segments = explode("/",$internalRoute);

                        $controllerName = array_shift($segments)."Controller";
                        $controllerName = ucfirst($controllerName);

                        $actionName = 'action'.ucfirst(array_shift($segments));

                        $parameters = $segments;
                        $controllerFile = ROOT . '/controllers/'. $controllerName . ".php";

                        if (file_exists($controllerFile)) {
                            // Connect file of controller class
                            include_once ($controllerFile);
                        }
                        // Create an object,call method

                        $controllerObject = new $controllerName;
                        $result = call_user_func_array(array($controllerObject,$actionName),$parameters);

                        if($result != null) {
                            break;
                        }
                    }
            }














        }
    }