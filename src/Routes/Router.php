<?php

namespace App\Routes;

class Router{
    private array $routes = [];

    public function get($uri, $action){
        $this->routes['GET'][$uri] = $action;
    }

    public function post ($uri, $action){
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(){
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$uri])){
            [$controllerClass, $methodName] = $this->routes[$method][$uri];

            $controller = new $controllerClass();
            $controller->$methodName();
        }else{
            header("HTTP/1.0 404 Not Found");
            require __DIR__ . '/../Views/404NotFound.php';        
        }
    }
        
}



