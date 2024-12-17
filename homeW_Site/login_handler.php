<?php
session_start();
require_once 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (login($login, $password)) {
        header('Location: header.php');
        exit();
    } else {
        echo '<script>alert("Invalid credentials. Redirecting to registration.");</script>';
        echo '<script>window.location = "header.php?page=4";</script>';
        exit();
    }
}
