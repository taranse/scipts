<?php
function getListItem($list, $id)
{
    $id = (int) $id;
    foreach ($list as $key => $item) {
        if ($id == $item['id']) {
            return $list[$key];
        }
    }
    return [];
}
$server = "localhost";
$base = "test";

$db = new PDO("mysql:host=$server;dbname=$base", 'root', '');
$sort = !empty($_GET['sort']) ? $_GET['sort'] : 'id';

$sql = "SELECT * FROM tasks ORDER BY $sort DESC";

$list = $db->query($sql)->fetchAll();

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список моих отчаяных задач</title>
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
<h2>Добавлю в отчаяный задачник!</h2>
<br>
<?php
if (!empty($_GET['update_id'])) { ?>
    <form action="taskList.php" method="get">
        <label> Описание задачи <br>
            <textarea name="description" cols="30"
                      rows="10"><?= getListItem($list, $_GET['update_id'])['description'] ?></textarea>
        </label><br>
        <input type="hidden" name="update_id" value="<?= $_GET['update_id'] ?>">
        <input type="submit" value="Обновить задачу" name="update_new_task">
    </form>
<?php } else { ?>
    <form action="taskList.php" method="get">
        <label> Описание задачи <br>
            <textarea name="description" cols="30" rows="10"></textarea>
        </label><br>
        <input type="submit" value="Добавить задачу" name="insert_new_task">
    </form>
<?php } ?>
<br><br>

<label> Сортировать задачи
    <select onchange="window.location = '<?= $url['path'] ?>' + this.value !== '' ? '?sort=' + this.value : '' ">
        <option value="">Убрать соритровку</option>
        <option <?php if (!empty($_GET['sort']) and $_GET['sort'] == "date_added") echo 'selected' ?>
                value="date_added">По дате
        </option>
        <option <?php if (!empty($_GET['sort']) and $_GET['sort'] == "is_done") echo 'selected' ?> value="is_done">По
            статусу
        </option>
        <option <?php if (!empty($_GET['sort']) and $_GET['sort'] == "description") echo 'selected' ?>
                value="description">По описанию
        </option>
    </select>
</label>
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
    <?php foreach ($list as $item) { ?>
        <tr>
            <td><?= htmlspecialchars($item['description']) ?></td>
            <td><?= $item['date_added'] ?></td>
            <td style="color: <?= $item['is_done'] ? 'green' : 'red' ?>">
                <?= $item['is_done'] ? 'Выполнено' : 'Не выполнено' ?>
            </td>
            <td>
                <?php
                if (!empty($_GET['update_id']) and $_GET['update_id'] == $item['id']) {
                    echo 'Изменяется';
                } else {
                    echo '<a href="index.php?update_id=' . $item['id'] . '">Изменить</a>';
                }
                ?>

            </td>
            <td>
                <?= $item['is_done'] ? 'Готово' : '<a href="taskList.php?id=' . $item['id'] . '">Выполнить</a>' ?>
            </td>
            <td>
                <a href="taskList.php?del=<?= $item['id'] ?>">Удалить</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>