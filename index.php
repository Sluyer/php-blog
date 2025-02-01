<?php

require_once 'vendor/autoload.php';

//config twig
$loader = new \Twig\Loader\FilesystemLoader('./src/views');
$twig = new \Twig\Environment($loader);

$path = $_SERVER['REQUEST_URI'];
$path = parse_url($path, PHP_URL_PATH);

switch ($path) {
    case '/':
        require_once('./src/controllers/homepage.php');
        break;
    case '/item':
        require_once('./src/controllers/item.php');
        break;
    case '/buy':
        require_once('./src/controllers/buy.php');
        break;
    case '/about':
        require_once('./src/controllers/about.php');
        break;
    case '/login':
        require_once('./src/controllers/login.php');
        break;
    case '/register':
        echo $twig->render('auth/register.twig');
        break;
    case '/search':
        require_once('./src/controllers/search.php');
        break;
    default:
        echo $twig->render('404.twig');
        break;
}
