<?php

require_once('./src/models/items.php');
require_once('./src/models/listing.php');

$items = new Items();
$requestedItem = $items->getOne($_GET['id']);

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = null;
}

if ($requestedItem) {
    $requestedItem = $requestedItem[0];
    $title = $requestedItem['name'];

    // Get listing for this item
    $listing = new Listing();
    $allListings = $listing->getListingOfItem($requestedItem['id']);
    echo $twig->render('item.twig', ['item' => $requestedItem, 'listings' => $allListings, 'user' => $user]);
} else {
    echo $twig->render('404.twig');
}
