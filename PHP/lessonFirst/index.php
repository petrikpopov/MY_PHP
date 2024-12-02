<?php
$title = "Bread";
$price = 20;
echo "<b>Title:$title</b>, <br/> Price:$price";
if($price>10){
    echo "<h2>Цена хлеба больше $price</h2>";
}
switch($price){
    case 30:
        echo "<h2>Цена хлеба 30</h2>";
    case 10:
        echo "<h2>Цена хлеба 10</h2>";
    case 20:
        echo "<h2>Цена хлеба 20</h2>";
}

define("PI", 3.14);
echo "<div>" . PI . "</div>";
