<?php
require_once 'db/UserDAO.php';

$post = $_POST;
$login = $post['login'];
$user_dao = new UserDAO();

if (isset($post['login'])) {
    $user = $user_dao->getIdByLogin($login);
} else {
    header("Location: auth-form.html");
}

if (!$user) {
    $user_dao->addNewUser($login, $post['password']);
    echo 'Пользователь успешно зарегистрирован!';
} else {
    header("Location: reg-form.html");
}

