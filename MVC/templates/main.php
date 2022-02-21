<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Главная</title>
</head>

<body>
    <nav>
        <a href="/">Главная</a>
        <a href="/cakes">Торты</a>
    </nav>

    <?= $message  ?>
    <h3>Заполните поля формы, чтобы добавить информацию о новом торте</h3>
    <form action="/add" method="post" name="add-cake" enctype="multipart/form-data">
        <label>Название
            <input type="text" name="title" required>
        </label>
        <label>Стоимость
            <input type="number" name="price" min="1" required>
        </label>
        <label>Описание
            <textarea name="description" cols="70" rows="1" wrap="soft" required minlength="5" maxlength="100"></textarea>
        </label>
        <label>Загрузите изображение торта
            <input type="file" name="picture" accept="image/jpeg,image/png,image/gif">
        </label>
        <input type="submit" value="Добавить">
    </form>

    <!-- ИЗМЕНИТЬ ПУТЬ К ФАЙЛУ : НАЧИНАЕТСЯ С /build -->
    <script src="/build/js/main.js"></script>
</body>
</html>