<?php


$title = 'Blogue 🐘';


// require Articles class
require_once('./src/models/items.php');
$itemsModel = new Items();
$items = $itemsModel->getOne(1337);
var_dump($items);


// place an order
require_once('./src/models/orders.php');
$ordersModel = new Orders();
$ordersModel->placeOrder(1337, 42);

require_once('./src/views/navbar.php');
require_once('./src/views/hero.php');
require_once('./src/views/homepage/featured.php');
require_once('./src/views/homepage/homepage.php');
