<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?= $cake['title'] ?></title>
</head>
<body>
    <nav>
        <a href="/">Главная</a>
        <a href="/cakes">Вернуться к каталогу</a>
    </nav>
    <h2><?= $cake['title'] ?></h2>
    <img src="../public/pictures/<?= $cake['picture'] ?>" alt="<?= $cake['title'] ?>">
    <p><?= $cake['description'] ?></p>
    <p><?= $cake['price'] ?></p>
</body>
</html>