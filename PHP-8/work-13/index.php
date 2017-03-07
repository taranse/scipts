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
            border: 1px solid #ccc;
            padding: 10px;
        }
        table th {
            background: #eee;
        }
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h1>Что же мне сегодня нужно сделать?</h1>

    <h2>Добавлю в задачник!</h2>
    <br>
    <form action="taskList.php" method="post">
        <label> Описание задачи <br>
            <textarea name="description" cols="30" rows="10"></textarea>
        </label><br>
        <input type="submit" value="Добавить задачу" name="">
    </form>

    <br><br>

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
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr>
        </tbody>
    </table>
</body>
</html>