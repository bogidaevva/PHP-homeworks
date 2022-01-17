<?php
$post = $_POST;

$login = $post['login'];
$password = $post['password'];

function get_answer($l, $p) {
    if ($l== 'qwe' && $p == 123) echo 1;
    else echo 0;
}

get_answer($login, $password);








