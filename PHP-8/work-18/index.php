<?php
define('URL_MAIN', 'work-18/');

session_start();

if (empty($_SESSION['user_login'])) {

    include 'login.php';

} else {

    include 'todoList.php';

}

