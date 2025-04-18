<?php

// Check if method is POST 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('./src/models/users.php');
    // get email and password from form
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userModel = new Users();
        $userModel->login($email, $password);
    }
} else {
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    } else {
        $error = null;
    }
    echo $twig->render('auth/login.twig', ['error' => $error]);
}
