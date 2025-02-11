<?php


if (isset($_GET['item'])) {
    require_once('./src/models/listing.php');
    $listingObject = new Listing();
    $bought = $listingObject->buyItem($_GET['item']);

    if ($bought) {
        echo $twig->render('buy.twig', ['item' => $_GET['item'], 'bought' => true]);
    } else {
        header('Location: /');
    }
}
