<?php
$items = require_once 'items-data.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Товары</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php foreach ($items as $item): ?>
        <div class="item">
            <h4><?= $item['title'] ?></h4>
            <p><?= $item['price'] ?></p>
            <div class="picture">
                <img src="images/<?= $item['image'] ?>" alt="<?= $item['title'] ?>">
            </div>
            <?php if ($item['count'] > 0):?>
            <a href="item.php?id=<?= $item['id'] ?>">Подробнее</a>
            <?php else: ?>
            <p>Товар закончился</p>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
</body>
</html>