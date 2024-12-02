<?php
$name = "Petro";
$age = 20;
echo "Hello my name is $name<br>";
echo "I'm Age - $age<br><br>";

$a = 8;
$b = 4;
$addition = $a + $b;
$subtraction = $a - $b;
$multiplication = $a * $b;
$division = $a / $b;
echo "'$a' + '$b' = '$addition'" . PHP_EOL;
echo "'$a' - '$b' = '$subtraction'" . PHP_EOL;
echo "'$a' * '$b' = '$multiplication'" . PHP_EOL;
echo "'$a' / '$b' = '$division'<br><br>" . PHP_EOL;

$a = 5;
$b = 10;
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo "a = $a, b = $b<br><br>"; 

$tag = 'h1';
$background_color = "#3498db";
$color = "#fff";
$width = "300px";
$height = "300px";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<$tag style='background-color:$background_color; color:$color; width:$width; height:$height;'>
            Доброго времени суток, Наталья, вы смотрите дз Попова Петра
        </$tag>"
    ?>
</body>
</html>
