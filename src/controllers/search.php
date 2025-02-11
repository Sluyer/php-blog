<?php
require_once __DIR__ . '/../../index.php';
require_once('./src/models/items.php');

$query = $_GET['query'];

$items = new Items();
$allItems = $items->search($query);

if (!$query) {
    echo $twig->render('404.twig');
    exit();
} else {
    echo $twig->render('/search/search.twig', ['query' => $query, 'items' => $allItems]);
}
