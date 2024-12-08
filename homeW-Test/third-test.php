<?php
session_start();

if (!isset($_SESSION['score_page3'])) {
    $_SESSION['score_page3'] = 0;
}

$questions_page3 = [
    ['question' => 'Яке найбільше фруктове дерево?', 'correct_answer' => 'apple'],
    ['question' => 'Назвіть фрукт, який має жовтий колір', 'correct_answer' => 'banana'],
    ['question' => 'Назвіть цитрусовий фрукт', 'correct_answer' => 'orange'],
    ['question' => 'Який фрукт червоний?', 'correct_answer' => 'cherry'],
    ['question' => 'Назвіть фрукт, що починається на літеру "m"', 'correct_answer' => 'mango'],
    ['question' => 'Який фрукт зелений і кислий?', 'correct_answer' => 'kiwi'],
    ['question' => 'Який фрукт виглядає як груша?', 'correct_answer' => 'pear'],
    ['question' => 'Назвіть фрукт, який росте на виноградних лозах', 'correct_answer' => 'grape'],
    ['question' => 'Який фрукт круглий і жовтий?', 'correct_answer' => 'lemon'],
    ['question' => 'Який фрукт за смаком солодкий і кислий одночасно?', 'correct_answer' => 'peach']
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;

    foreach ($questions_page3 as $index => $question) {
        if (isset($_POST['q' . ($index + 1)]) && strtolower(trim($_POST['q' . ($index + 1)])) === $question['correct_answer']) {
            $score += 5;
        }
    }

    $_SESSION['score_page3'] = $score;
    header('Location: results.php');
    exit;
}
?>
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
        border: 2px solid orange;
        cursor: pointer;
        font-size: 22px;
        font-weight: 600;
        margin-top: auto;
    }
</style>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Тестування - Сторінка 3</title>
</head>
<body>
    <h1>Тестування - Сторінка 3</h1>
    <form method="POST" class="tests-form">
        <?php foreach ($questions_page3 as $index => $question): ?>
            <div>
                <p><?php echo $question['question']; ?></p>
                <input type="text" name="q<?php echo $index + 1; ?>" required>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="button-next">Finish</button>
    </form>
</body>
</html>
