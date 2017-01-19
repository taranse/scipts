<?php
error_reporting('E_ALL');
ini_set('display_errors', 1);
include 'about.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $name ?> - <?= $description ?></title>
</head>
<style>
    body {
        font-size: 20px;
    }

    h1 {
        text-align: center;
    }

    table {
        margin: auto;
    }

    table tr:nth-child(even) {
        background-color: #ccc;
    }

    td {
        padding: 10px;
    }
</style>
<body>
<h1>Страница пользователя <?= $name ?></h1>
<table>
    <tbody>
    <tr>
        <td>Имя</td>
        <td><?= $name ?></td>
    </tr>
    <tr>
        <td>Возраст</td>
        <td><?= $age ?></td>
    </tr>
    <tr>
        <td>Адрес электронной почты</td>
        <td><a href="mailto:<?= $email ?>"><?= $email ?></a></td>
    </tr>
    <tr>
        <td>Город</td>
        <td><?= $city ?></td>
    </tr>
    <tr>
        <td>О себе</td>
        <td><?= $description ?></td>
    </tr>
    </tbody>
</table>
</body>
</html>

