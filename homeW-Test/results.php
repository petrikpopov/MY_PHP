<?php
session_start();
$total_score = $_SESSION['score_page1'] + $_SESSION['score_page2'] + $_SESSION['score_page3'];

session_destroy();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Результати тесту</title>
</head>
<body>
    <h1>Результати вашого тесту</h1>
    <p>Ви набрали: <strong><?php echo $total_score; ?></strong> балів.</p>
    <?php if ($total_score >= 25): ?>
        <p>Відмінний результат! Ви добре засвоїли матеріал.</p>
    <?php elseif ($total_score >= 15): ?>
        <p>Добре, але є куди прагнути. Спробуйте ще раз!</p>
    <?php else: ?>
        <p>Потрібно більше зусиль. Перегляньте матеріал і спробуйте ще раз.</p>
    <?php endif; ?>

    <a href="first-test.php">Повернутися на головну</a>
</body>
</html>
