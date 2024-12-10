<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $file = 'users.json';
    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    if (isset($users[$username])) {
        die('Користувач з таким логіном вже існує! <a href="index.php">Повернутися</a>');
    }

    $users[$username] = password_hash($password, PASSWORD_BCRYPT);
    file_put_contents($file, json_encode($users));

    $_SESSION['user'] = $username;

    setcookie('user', $username, time() + (7 * 24 * 60 * 60), '/'); 
    echo "Реєстрація успішна! Ви увійшли як $username. <a href='index.php'>Повернутися</a>";
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>
