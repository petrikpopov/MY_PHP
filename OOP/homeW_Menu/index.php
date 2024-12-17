<?php
require_once 'Menu.php';

$menu = new Menu();

$menu->AddMenuItem('Home', 'index.php');
$menu->AddMenuItem('About', 'about.php');
$menu->AddMenuItem('Photo', 'photo.php');
$menu->AddMenuItem('Contact Us', 'contact.php');
$menu->AddMenuItem('Login', 'login.php');

$menu->PrintMenu('120px', '40px', '#007BFF', '#FFFFFF');
?>
