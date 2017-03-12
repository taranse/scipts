<?php
define('URL_MAIN', '/PHP-8/work-14/');

session_start();

if (empty($_SESSION['user_login'])) {

    include 'login.php';

} else {

    include 'todoList.php';

}

