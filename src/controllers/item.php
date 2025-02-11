<?php
require_once __DIR__ . '/../../index.php';
require_once('./src/models/items.php');
require_once('./src/models/listing.php');

$items = new Items();

// Vérification et conversion sécurisée de `id`
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id === null || $id === false) {
    echo $twig->render('404.twig');
    exit;
}

$requestedItem = $items->getOne($id);

/** @var array|null $user */
$user = $_SESSION['user'] ?? null;

if ($requestedItem) {
    $requestedItem = $requestedItem[0];

    // Récupérer les vendeurs de cet item
    $listing = new Listing();
    $allListings = $listing->getListingOfItem($requestedItem['id']);

    echo $twig->render('item.twig', [
        'item' => $requestedItem,
        'listings' => $allListings,
        'user' => $user
    ]);
} else {
    echo $twig->render('404.twig');
}
