<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: auth-form.html');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Личный кабинет</title>
</head>
<body>
    <h2>Добро пожаловать, <?= $_SESSION['login'] ?>!</h2>
</body>
</html>