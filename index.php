<?php

require_once 'vendor/autoload.php';

//config twig
$loader = new \Twig\Loader\FilesystemLoader('./src/views');
$twig = new \Twig\Environment($loader);

$path = $_SERVER['REQUEST_URI'];

if ($path === '/') {
   
    //simule 5objets pour les derniers objts
    $lastItems = [
        ['id' => 101, 'name' => 'Canapé', 'price' => 1500, 'date_added' => '2025-01-21'],
        ['id' => 102, 'name' => 'Lampe fleurie', 'price' => 800, 'date_added' => '2025-01-20'],
        ['id' => 103, 'name' => 'Table basse', 'price' => 1200, 'date_added' => '2025-01-19'],
        ['id' => 104, 'name' => 'Armoire en bois', 'price' => 2500, 'date_added' => '2025-01-18'],
        ['id' => 105, 'name' => 'Tapis rayé', 'price' => 900, 'date_added' => '2025-01-17'],
    ];

    //simule la connexion
    $isConnected = true; //true simule connecté
    $username = $isConnected ? 'Louis' : null;

    echo $twig->render('homepage.twig', [
        'title' => 'Accueil',
        'isConnected' => $isConnected,
        'username' => $username,
        'lastItems' => $lastItems
    ]);

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
} else {
    echo $twig->render('404.twig', ['title' => 'Page introuvable']);
}
