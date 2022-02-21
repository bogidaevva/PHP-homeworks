<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Торты</title>
</head>

<body>
    <nav>
        <a href="/">Главная</a>
        <a href="/cakes">Торты</a>
    </nav>
    <?= $message ?>
    <form name="price">
        <input type="number" min="0" max="99990" name="min" placeholder="от">
        <input type="number" min="0" max="100000" name="max" placeholder="до">
        <input type="submit" value="найти по стоимости">
    </form>
    <form name="title">
        <input type="text" name="title" placeholder="введите название">
        <input type="submit" value="найти по названию">
    </form>
    
    <?php foreach ($cakes as $cake) : ?>
        <div class="cake">
            <h4><?= $cake['title'] ?></h4>
            <p><?= $cake['price'] ?></p>
            <a href="/cake?id=<?= $cake['id'] ?>">Подробнее</a>
        </div>
    <?php endforeach; ?>

    <script src="/js/cakes.js"></script>
</body>

</html>