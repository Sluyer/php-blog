<?php


$title = 'Blogue 🐘';


// require Articles class
require_once('./src/models/items.php');
$itemsModel = new Items();
$items = $itemsModel->getOne(1337);
var_dump($items);

require_once('./src/views/navbar.php');
require_once('./src/views/hero.php');
require_once('./src/views/homepage/featured.php');
require_once('./src/views/homepage/homepage.php');
