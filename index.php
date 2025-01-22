<?php

require_once 'vendor/autoload.php';

//config twig
$loader = new \Twig\Loader\FilesystemLoader('./src/views');
$twig = new \Twig\Environment($loader);

$path = $_SERVER['REQUEST_URI'];


$path = parse_url($path, PHP_URL_PATH);

if ($path === '/') {
    require_once('./src/controllers/homepage.php');
} elseif ($path === '/items') {
    //exemple objets fictifs
    $items = [
        ['id' => 1, 'name' => 'Table en bois', 'average_price' => 1200],
        ['id' => 2, 'name' => 'Lampe fleurie', 'average_price' => 800],
    ];
    echo $twig->render('items/list.twig', ['items' => $items]);
} elseif (preg_match('/\/items\/(\d+)/', $path, $matches)) {
    $itemId = $matches[1];
    //exemple données fictives
    $item = ['id' => $itemId, 'name' => 'Table en bois', 'description' => 'Une table élégante en bois.'];
    $sellers = [
        ['name' => 'Marie', 'price' => 1100, 'contact' => 'marie@example.com'],
        ['name' => 'Tom', 'price' => 1250, 'contact' => null],
    ];
    echo $twig->render('items/detail.twig', ['item' => $item, 'sellers' => $sellers]);
} elseif ($path === '/item') {
    require_once('./src/controllers/item.php');
} elseif ($path === '/login') {
    echo $twig->render('auth/login.twig', ['title' => 'Connexion']);
} else {
    echo $twig->render('404.twig', ['title' => 'Page introuvable']);
}
