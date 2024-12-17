<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($password)) {
        echo '<script>alert("Both fields are required!");</script>';
        echo '<script>window.location = "register.php";</script>';
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $filePath = 'users.txt';
    $userData = $name . ':' . $hashedPassword . PHP_EOL;

    if (file_exists($filePath)) {
        $users = file($filePath, FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            list($existingUser, ) = explode(':', $user);
            if ($existingUser === $name) {
                echo '<script>alert("User already exists!");</script>';
                echo '<script>window.location = "register.php";</script>';
                exit();
            }
        }
    }

    file_put_contents($filePath, $userData, FILE_APPEND | LOCK_EX);

    echo '<script>alert("Registration successful! Please log in.");</script>';
    echo '<script>window.location = "header.php";</script>';
    exit();
}
