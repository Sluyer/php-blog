<?php
require_once __DIR__ . '/../../index.php';




// Get items
require_once('./src/models/items.php');
$items = new Items();
$allItems = $items->getAll();

echo $twig->render('homepage.twig', ['items' => $allItems]);
