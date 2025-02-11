<?php
require_once __DIR__ . '/../../index.php';
// check session start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = null;
}



echo $twig->render('header.twig', ['user' => $user]);
