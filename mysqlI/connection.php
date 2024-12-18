<?php

$servername = "mysql-d790748-popov911petia-cdcb.d.aivencloud.com";
$username = "avnadmin";
$password = "AVNS_fs5L364sBy1oG0FkuUH";
$dbname = "Shop";
$port = 17793;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Процедурний стиль
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Перевірка підключення
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
