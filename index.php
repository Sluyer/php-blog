<?php


// Router Php


class Router
{

    private $routes = array(
        '/' => 'homepage',
        '/about' => 'about',
    );

    public function __construct()
    {
        $this->route();
    }

    public function route()
    {
        require_once('./src/views/header/header.php');
        $path = $_SERVER['REQUEST_URI'];
        if (array_key_exists($path, $this->routes)) {
            $controller = $this->routes[$path];
   
            require_once('./src/controllers/' . $controller . '.php');
        } else {
            require_once('./src/controllers/404.php');
        }
    }
}

$router = new Router();
