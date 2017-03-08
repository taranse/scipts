<?php
include 'DataBase.php';
$base = new DataBase();

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список задач на сегодня</title>
    <style>
        table td, table th {
            border:1px solid #ccc;
            padding:10px;
        }
        table th {
            background:#eee;
        }
        table {
            border-spacing:0;
            border-collapse:collapse;
        }
    </style>
</head>
<body>
<h1>Что же мне сегодня нужно сделать?</h1>

<h2>Добавлю в задачник!</h2>
<br>
<form action="taskList.php" method="get">
    <label> Описание задачи <br>
        <textarea name="description" cols="30" rows="10"></textarea>
    </label><br>
    <input type="submit" value="Добавить задачу" name="insert_new_task">
</form>

<br><br>

<?php
$list = $base->useTable('tasks')->order(['date_added' => 'DESC'])->getList();
?>
<table>
    <thead>
    <tr>
        <th>Описание</th>
        <th>Дата</th>
        <th>Статус</th>
        <th>Изменить</th>
        <th>Выполнить</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $item) { ?>
            <tr>
                <td><?= $item->description ?></td>
                <td><?= $item->date_added ?></td>
                <td style="color: <?= $item->is_done ? 'green' : 'red' ?>">
                    <?= $item->is_done ? 'Выполнено' : 'Не выполнено' ?>
                </td>
                <td>Изменить</td>
                <td>Выполнить</td>
                <td>Удалить</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>