<?php

// Get item based on id
require_once('./src/models/items.php');
$items = new Items();
$requestedItem = $items->getOne($_GET['id']);



if ($requestedItem) {
    $requestedItem = $requestedItem[0]; 
    $title = $requestedItem['name'];
    echo $twig->render('item.twig', ['item' => $requestedItem]);
} else {
    echo $twig->render('404.twig');
}