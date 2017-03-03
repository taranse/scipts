<?php
$mysqli = new mysqli("localhost", "root", "", "test");
$getParams = ['isbn', 'name', 'author'];
$where = [];
foreach($_GET as $key => $get) {
    if(in_array($key, $getParams) and !empty($get)) {
        $where[] = "$key LIKE '%$get%'";
    }
}
$books = $mysqli->query(count($where) ? "SELECT * FROM books WHERE ". implode($where, ' AND ') : "SELECT * FROM books");
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid #ccc;
            padding: 5px;
        }

        table th {
            background: #eee;
            text-align: left;
        }
    </style>
</head>
<body>
<h1>Фильтры для самых отчаяных</h1>
<form>
    <input type="text" name="isbn" placeholder="ISBN" value="<?= $_GET['isbn'] ?>">
    <input type="text" name="name" placeholder="Название книги" value="<?= $_GET['name'] ?>">
    <input type="text" name="author" placeholder="Автор книги" value="<?= $_GET['author'] ?>">
    <input type="submit" value="Поиск">
</form>
<br>
<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISBN</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($books as $book) { ?>
        <tr>
            <td><?= $book['name'] ?></td>
            <td><?= $book['author'] ?></td>
            <td><?= $book['year'] ?></td>
            <td><?= $book['genre'] ?></td>
            <td><?= $book['isbn'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
