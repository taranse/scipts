<?php
define('URL_MAIN', 'work-18/');
require "db.php";
require_once 'vendor/autoload.php';

session_start();

if (empty($_SESSION['user_login'])) {

    include 'login.php';

} else {

    include 'todoList.php';

}

