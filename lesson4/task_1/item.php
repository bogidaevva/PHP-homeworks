<?php
$get = $_GET;
$id = $get['id'];

if (!isset($id)) {
    header("Location: items.php");
}

function show_item(int $gotten_id) {
    $items = require_once 'items-data.php';
    foreach ($items as $item) {
        if ($gotten_id === $item['id']) return $item;
    }
}

$item = show_item($id);

if (!isset($item)) {
    header("Location: items.php");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?= $item['title'] ?></title>
</head>
<body>
    <div>
        <h2><?= $item['title'] ?></h2>
        <p><?= $item['description'] ?></p>
        <p>Стоимость: <?= $item['price'] ?></p>
        <img src="images/<?= $item['image'] ?>" alt="<?= $item['title'] ?>">
    </div>
</body>
</html>