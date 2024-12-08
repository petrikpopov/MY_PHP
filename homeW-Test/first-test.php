<?php
session_start();

if (!isset($_SESSION['score_page1'])) {
    $_SESSION['score_page1'] = 0;
}

$questions_page1 = [
    ['question' => 'Який рік вважається початком Другої світової війни?', 'answers' => ['1939', '1945', '1914', '1921'], 'correct_answer' => '1939'],
    ['question' => 'Скільки материків існує на Землі?', 'answers' => ['5', '6', '7', '8'], 'correct_answer' => '7'],
    ['question' => 'Яка найбільша планета в Сонячній системі?', 'answers' => ['Земля', 'Юпітер', 'Марс', 'Сатурн'], 'correct_answer' => 'Юпітер'],
    ['question' => 'Скільки хромосом у людини?', 'answers' => ['23', '46', '64', '92'], 'correct_answer' => '46'],
    ['question' => 'Хто написав роман "Гаррі Поттер і філософський камінь"?', 'answers' => ['Джоан Роулінг', 'Джордж Орвелл', 'Марк Твен', 'Стівен Кінг'], 'correct_answer' => 'Джоан Роулінг'],
    ['question' => 'Яка столиця Франції?', 'answers' => ['Берлін', 'Мадрид', 'Париж', 'Рим'], 'correct_answer' => 'Париж'],
    ['question' => 'Скільки секунд у хвилині?', 'answers' => ['30', '60', '100', '120'], 'correct_answer' => '60'],
    ['question' => 'Хто написав музику до "Місячної сонати"?', 'answers' => ['Бах', 'Моцарт', 'Бетховен', 'Чайковський'], 'correct_answer' => 'Бетховен'],
    ['question' => 'Яка хімічна формула води?', 'answers' => ['H2O', 'CO2', 'NaCl', 'CH4'], 'correct_answer' => 'H2O'],
    ['question' => 'Хто першим здійснив політ у космос?', 'answers' => ['Ніл Армстронг', 'Юрій Гагарін', 'Ілон Маск', 'Леонід Каденюк'], 'correct_answer' => 'Юрій Гагарін']
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;

    foreach ($questions_page1 as $index => $question) {
        if (isset($_POST['q' . ($index + 1)]) && $_POST['q' . ($index + 1)] === $question['correct_answer']) {
            $score++;
        }
    }

    $_SESSION['score_page1'] = $score; 
    header('Location: second-test.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Тестування - Сторінка 1</title>
</head>
<style>
    .tests-form {
        display: grid;
        grid-template-columns: repeat(4,1fr);
        gap: 20px;
    }
    .button-next {
        width: 100px;
        height: 50px;
        padding: 10px;
        border-radius: 20px;
        border: 2px solid red;
        cursor: pointer;
        font-size: 22px;
        font-weight: 600;
        margin-top: auto;
    }
</style>
<body>
    <h1>Тестування - Сторінка 1</h1>
    <form method="POST" class="tests-form">
        <?php foreach ($questions_page1 as $index => $question): ?>
            <div>
                <p><?php echo $question['question']; ?></p>
                <?php foreach ($question['answers'] as $answer): ?>
                    <input type="radio" name="q<?php echo $index + 1; ?>" value="<?php echo $answer; ?>" required> <?php echo strtoupper($answer); ?><br>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <button class="button-next" type="submit">Next</button>
    </form>
</body>
</html>
