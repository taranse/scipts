<?php
include 'DataBase.php';
$pdo = new DataBase();

$tables = $pdo->showAllTables();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<script>

    var getTableStructure = function (tableName, e) {
        e.preventDefault();
        $.get('/ajax.php?cmd=getTable&table=' + tableName, function (list) {
            var array = JSON.parse(list);
            $('.table tbody').html('');
            array.forEach(function (item) {
                $('.table tbody').append('<tr>' +
                    '<td>'+ item.Field +'</td>' +
                    '<td>'+ item.Type +'</td>' +
                    '<td>'+ item.Null +'</td>' +
                    '<td>'+ item.Key +'</td>' +
                    '<td>'+ item.Default +'</td>' +
                    '<td>'+ item.Extra +'</td>' +
                    '</tr>');
            });
            $('.table').css('display', 'block');
        });
    }

</script>

<h4>Список таблиц</h4>
<ul>
    <?php foreach ($tables as $table) { ?>
        <li>
            <a href="" onclick="getTableStructure('<?= $table["Tables_in_$pdo->base"] ?>', event)">
                <?= $table["Tables_in_$pdo->base"]?>
            </a>
        </li>
    <?php } ?>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Null</th>
                    <th>Key</th>
                    <th>Default</th>
                    <th>Extra</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <style>
        .table {display: none;margin-top: 20px;}
        td, th {
            padding: 10px;
            min-width: 100px;
        }
        thead {
            background-color: #eee;
        }
    </style>
</ul>
</body>
</html>