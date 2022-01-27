<?php
$post = $_POST;

$login = $post['login'];
$password = $post['password'];

if (file_exists('logins.txt')) {
    $logins = file('logins.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES );
    if (in_array($login, $logins)) {
        echo 0;
    } else {
        if (file_put_contents('logins.txt', $login . PHP_EOL, LOCK_EX | FILE_APPEND) !== false) {
            echo 1;
        }
    }
} else {
    if (file_put_contents('logins.txt', $login . PHP_EOL, LOCK_EX | FILE_APPEND) !== false) {
        echo 1;
    } else {
        echo 'error';
    }
}
