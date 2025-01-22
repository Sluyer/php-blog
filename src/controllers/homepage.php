<?php


$title = 'Blogue 🐘';


// require Articles class
require_once('./src/models/articles.php');

/** @var Articles $articles */
$articles = new Articles();

/** @var array $allArticles */
$allArticles = $articles->getAll();

/** @var array $featuredArticles */
$featuredArticles = array_slice($allArticles, 0, 3);


require_once('./src/views/navbar.php');
require_once('./src/views/hero.php');
require_once('./src/views/homepage/featured.php');
require_once('./src/views/homepage/homepage.php');
