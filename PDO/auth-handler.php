<?php
require_once 'db/UserDAO.php';

$post = $_POST;
$login = $post['login'];
$user_dao = new UserDAO();


if (isset($login)) {
    if ($user_dao->getPasswordByLogin($login)) {
        $password = $user_dao->getPasswordByLogin($login)['password'];
        if ($password) {
            if ($password === $post['password']) {
                session_start();
                $_SESSION['login'] = $login;
                echo 'success';
            } else if ($password !== $post['password']) {
                echo 'invalid password';
            } else {
                echo 'user not found';
            }
        } else {
            echo 'invalid password';
        }
    } else {
        echo 'user not found';
    }
} else {
    header("Location: auth-form.html");
}

    


