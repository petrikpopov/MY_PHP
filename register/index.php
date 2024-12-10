<?php
session_start();

if (isset($_SESSION['user']) || isset($_COOKIE['user'])) {
    $username = $_SESSION['user'] ?? $_COOKIE['user'];
    echo "Ви увійшли як $username! <a href='logout.php'>Вийти</a>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація користувача</title>
</head>
<style>
* {
   box-sizing: border-box;
}
body {
    background: lightseagreen;
}
.transparent {
   position: relative;
   max-width: 400px;
   padding: 60px 50px;
   margin: 50px auto 0;
   background-image: url(https://html5book.ru/wp-content/uploads/2017/01/photo-roses.jpg);
   background-size: cover;
   border-radius: 20px;
}
.transparent:before {
   content: "";
   position: absolute;
   border-radius: 20px;
   top: 0;
   left: 0;
   right: 0;
   bottom: 0;
   background: linear-gradient(to right bottom, rgba(43, 44, 78, .5), rgba(104, 22, 96, .5));
}
.form-inner {
   position: relative;
}
.form-inner h3 {
   position: relative;
   margin-top: 0;
   color: white;
   font-family: 'Roboto', sans-serif;
   font-weight: 300;
   font-size: 26px;
   text-transform: uppercase;
}
.form-inner h3:after {
   content: "";
   position: absolute;
   left: 0;
   bottom: -6px;
   height: 2px;
   width: 60px;
   background: #1762EE;
}
.form-inner label {
   display: block;
   padding-left: 15px;
   font-family: 'Roboto', sans-serif;
   color: rgba(255, 255, 255, .6);
   text-transform: uppercase;
   font-size: 14px;
}
.form-inner input {
   display: block;
   width: 100%;
   padding: 0 15px;
   margin: 10px 0 15px;
   border-width: 0;
   line-height: 40px;
   border-radius: 20px;
   color: white;
   background: rgba(255, 255, 255, .2);
   font-family: 'Roboto', sans-serif;
}
.form-inner input[type="checkbox"] {
   position: absolute;
   opacity: 0;
}
.form-inner input[type="submit"] {
   background: #1762EE;
   margin-top: 40px;
}
</style>
<body>
    <form action="register.php" class="transparent" method="post">
        <div class="form-inner">
            <h3>Регистрация</h3>
            <label for="username">Имя пользователя</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Зареєструватися">
        </div>
    </form>
</body>
</html>
