<?php
session_start();
if (!empty($_POST['type']) and $_POST['type'] == 'admin') {
    $json = file_get_contents($_POST['login'] . '.json');
    $password = json_decode($json)->password;
    if($password == $_POST['password']){
        $_SESSION['TYPE'] = 'admin';
        $_SESSION['NAME'] = $_POST['login'];
        header('location:http://university.netology.ru/user_data/plyakin/work-8/admin.php');
    }else exit(header('location:' . $_SERVER['HTTP_REFERER'] .''));    
}else if (!empty($_POST['type']) and $_POST['type'] == 'guest') {    
    $_SESSION['TYPE'] = 'guest';
    $_SESSION['NAME'] = $_POST['name'];
    header('location:http://university.netology.ru/user_data/plyakin/work-8/list.php');
}else if (!empty($_GET['logout'])) {
    session_unset();
    header('location:http://university.netology.ru/user_data/plyakin/work-8/index.php');
}