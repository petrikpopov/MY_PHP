<?php
$N = 10;
$oddNumbers = [];
for ($i = 1; count($oddNumbers) < $N; $i += 1) {
    $oddNumbers[] = $i;
}

$average = array_sum($oddNumbers) / count($oddNumbers);

$reversedNumbers = array_reverse($oddNumbers);

$maxNumber = max($oddNumbers);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Непарні числа</title>
    <style>
        .odd-number {
            color: red;
            font-size: <?php echo $maxNumber; ?>px;
        }
    </style>
</head>
<body>
    <h1>Непарні числа</h1>
    <p>Перших <?php echo $N; ?> непарних чисел:</p>
    <div>
        <?php foreach ($oddNumbers as $number): ?>
            <span class="odd-number"><?php echo $number; ?></span>
        <?php endforeach; ?>
    </div>

    <p>Середнє значення: <?php echo $average; ?></p>

    <p>Непарні числа у зворотному порядку:</p>
    <div>
        <?php foreach ($reversedNumbers as $number): ?>
            <span class="odd-number"><?php echo $number; ?></span>
        <?php endforeach; ?>
    </div>
</body>
</html>

<?php
function isMirrored($number) {
    $str = (string)$number;
    return $str[0] === $str[3] && $str[1] === $str[2];
}

function allDigitsEven($number) {
    $digits = str_split((string)$number);
    foreach ($digits as $digit) {
        if ($digit % 2 !== 0) {
            return false;
        }
    }
    return true;
}

function allDigitsOdd($number) {
    $digits = str_split((string)$number);
    foreach ($digits as $digit) {
        if ($digit % 2 === 0) {
            return false;
        }
    }
    return true;
}

function isDescending($number) {
    $digits = str_split((string)$number);
    for ($i = 0; $i < count($digits) - 1; $i++) {
        if ($digits[$i] <= $digits[$i + 1]) {
            return false;
        }
    }
    return true;
}

$mirroredCount = 0;
$allEvenCount = 0;
$allOddCount = 0;
$descendingCount = 0;

for ($i = 1000; $i <= 9999; $i++) {
    if (isMirrored($i)) {
        $mirroredCount++;
    }
    if (allDigitsEven($i)) {
        $allEvenCount++;
    }
    if (allDigitsOdd($i)) {
        $allOddCount++;
    }
    if (isDescending($i)) {
        $descendingCount++;
    }
}

echo "Кількість дзеркальних чисел: $mirroredCount\n";
echo "Кількість чисел, у яких всі цифри парні: $allEvenCount\n";
echo "Кількість чисел, у яких всі цифри непарні: $allOddCount\n";
echo "Кількість чисел, у яких цифри йдуть у порядку від більшого до меншого: $descendingCount\n";
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сині круги</title>
    <style>
        .circle {
            width: 50px;
            height: 50px;
            background-color: blue;
            border-radius: 50%;
            display: inline-block;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div>
        <?php
        for ($i = 0; $i < 10; $i++) {
            echo '<span class="circle"></span>';
        }
        ?>
    </div>
</body>
</html>

<?php
$binaryNumber = "110110";
$hexNumber = base_convert($binaryNumber, 2, 16);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перетворення числа</title>
</head>
<body>
    <p>Шістнадцяткове представлення числа <?php echo $binaryNumber; ?>: <?php echo strtoupper($hexNumber); ?></p>
</body>
</html>


<?php
function toRoman($number) {
    $map = [
        1000 => 'M',
        900  => 'CM',
        500  => 'D',
        400  => 'CD',
        100  => 'C',
        90   => 'XC',
        50   => 'L',
        40   => 'XL',
        10   => 'X',
        9    => 'IX',
        5    => 'V',
        4    => 'IV',
        1    => 'I'
    ];
    
    $result = '';
    foreach ($map as $value => $roman) {
        while ($number >= $value) {
            $result .= $roman;
            $number -= $value;
        }
    }
    return $result;
}

$number = 1987;
$romanNumber = toRoman($number);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Число в римській системі числення</title>
</head>
<body>
    <p>
        Число: <?php echo $number; ?><br>
        Римське число: <?php echo $romanNumber; ?>
    </p>
</body>
</html>

<?php
$year = date('Y');
$month = date('n');
$today = date('j');

$weekends = [6, 7];

$holidays = [1];

$daysOfWeek = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'];

$totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

$firstDayOfMonth = date('N', strtotime("$year-$month-01")) - 1;

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календар</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            width: 100%;
            max-width: 400px;
            margin: 20px auto;
            text-align: center;
        }
        .day {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .header {
            font-weight: bold;
            background-color: #f0f0f0;
        }
        .weekend, .holiday {
            color: red;
        }
        .today {
            border: 2px solid blue;
            font-weight: bold;
        }
        .day:hover {
            color: white;
            background-color: red;
        }
        .weekend:hover, .holiday:hover {
            background-color: black;
        }
    </style>
</head>
<body>
    <div class="calendar">
        <?php foreach ($daysOfWeek as $day): ?>
            <div class="day header"><?php echo $day; ?></div>
        <?php endforeach; ?>
        <?php for ($i = 0; $i < $firstDayOfMonth; $i++): ?>
            <div class="day"></div>
        <?php endfor; ?>
        <?php for ($day = 1; $day <= $totalDays; $day++): ?>
            <?php
            $dayOfWeek = ($firstDayOfMonth + $day - 1) % 7 + 1;
            $classes = 'day';

            if (in_array($dayOfWeek, $weekends)) {
                $classes .= ' weekend';
            }

            if (in_array($day, $holidays)) {
                $classes .= ' holiday';
            }

            if ($day == $today) {
                $classes .= ' today';
            }
            ?>
            <div class="<?php echo $classes; ?>"><?php echo $day; ?></div>
        <?php endfor; ?>
    </div>
</body>
</html>



