<?php
session_start();

if (!isset($_SESSION['score_page2'])) {
    $_SESSION['score_page2'] = 0;
}

$questions_page2 = [
    ['question' => 'Які з наведених країн знаходяться в Європі?', 'answers' => ['Франція', 'Канада', 'Німеччина', 'Австралія'], 'correct_answers' => ['Франція', 'Німеччина']],
    ['question' => 'Виберіть планети Сонячної системи.', 'answers' => ['Земля', 'Луна', 'Марс', 'Сонце'], 'correct_answers' => ['Земля', 'Марс']],
    ['question' => 'Які з наведених тварин є ссавцями?', 'answers' => ['Кіт', 'Акула', 'Кенгуру', 'Крокодил'], 'correct_answers' => ['Кіт', 'Кенгуру']],
    ['question' => 'Виберіть основні кольори.', 'answers' => ['Червоний', 'Зелений', 'Синій', 'Чорний'], 'correct_answers' => ['Червоний', 'Синій']],
    ['question' => 'Які з наведених мов є офіційними в ООН?', 'answers' => ['Англійська', 'Іспанська', 'Японська', 'Китайська'], 'correct_answers' => ['Англійська', 'Іспанська', 'Китайська']],
    ['question' => 'Які з наведених чисел є парними?', 'answers' => ['2', '3', '4', '7'], 'correct_answers' => ['2', '4']],
    ['question' => 'Які з наведених океанів є найбільшими?', 'answers' => ['Тихий', 'Атлантичний', 'Індійський', 'Північний Льодовитий'], 'correct_answers' => ['Тихий', 'Атлантичний']],
    ['question' => 'Виберіть природні явища.', 'answers' => ['Дощ', 'Пожежа', 'Торнадо', 'Вибух'], 'correct_answers' => ['Дощ', 'Торнадо']],
    ['question' => 'Які з наведених винаходів належать до ХХ століття?', 'answers' => ['Комп’ютер', 'Телевізор', 'Телефон', 'Лазер'], 'correct_answers' => ['Комп’ютер', 'Лазер']],
    ['question' => 'Які з наведених чисел діляться на 5 без залишку?', 'answers' => ['10', '15', '21', '30'], 'correct_answers' => ['10', '15', '30']]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;

    foreach ($questions_page2 as $index => $question) {
        if (isset($_POST['q' . ($index + 1)])) {
            $selected = $_POST['q' . ($index + 1)];
            sort($selected);
            sort($question['correct_answers']);
            if ($selected === $question['correct_answers']) {
                $score += 2;
            }
        }
    }

    $_SESSION['score_page2'] = $score;
    header('Location: third-test.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Тестування - Сторінка 2</title>
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
        border: 2px solid green;
        cursor: pointer;
        font-size: 22px;
        font-weight: 600;
        margin-top: auto;
    }
</style>
<body>
    <h1>Тестування - Сторінка 2</h1>
    <form method="POST" class="tests-form">
        <?php foreach ($questions_page2 as $index => $question): ?>
            <div>
                <p><?php echo $question['question']; ?></p>
                <?php foreach ($question['answers'] as $answer): ?>
                    <input type="checkbox" name="q<?php echo $index + 1; ?>[]" value="<?php echo $answer; ?>"> Варіант <?php echo strtoupper($answer); ?><br>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="button-next">Next</button>
    </form>
</body>
</html>
