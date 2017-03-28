<?php
function getListItem($list, $id)
{
    $id = (int)$id;
    foreach ($list as $key => $item) {
        if ($id == $item['id']) {
            return $list[$key];
        }
    }
    return [];
}

function getIdUser($users, $login)
{
    foreach ($users as $user) {
        if ($user['login'] == $login) return $user['id'];
    }
}

function getLoginUser($users, $id)
{
    foreach ($users as $user) {
        if ($user['id'] == $id) return $user['login'];
    }
}

$server = "localhost";
$base = "test";

$db = new PDO("mysql:host=$server;dbname=$base", 'root', '');
$sort = !empty($_GET['sort']) ? $_GET['sort'] : 'id';

$users = $db->query("SELECT * FROM users")->fetchAll();
$_SESSION['id'] = getIdUser($users, $_SESSION['login']);

$sql = "
SELECT * FROM tasks 
WHERE author = " . $_SESSION['id'] . " or user = " . $_SESSION['id'] . " 
ORDER BY $sort DESC";


$list = $db->query($sql)->fetchAll();

function yourLogin($item)
{
    return $item['author'] == $_SESSION['id'];
}
function otherLogin($item)
{
    return $item['author'] !== $_SESSION['id'];
}

$yourList = array_filter($list, "yourLogin");
$otherList = array_filter($list, "otherLogin");

$url = parse_url($_SERVER['REQUEST_URI']);
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
                      rows="10"><?= htmlspecialchars(getListItem($list, $_GET['update_id'])['description']) ?></textarea>
        </label><br><br>
        <label> Закрепить за пользователем <br>
            <select name="user">
                <option value="0"
                    <?php if (getListItem($list, $_GET['update_id'])['author'] == 0) echo 'selected' ?>
                >Моя задача
                </option>
                <?php
                foreach ($users as $user) {
                    if (getListItem($list, $_GET['update_id'])['id'] !== 0) {
                        echo '<option value="' . $user['id'] . '" >' . $user['login'] . '</option>';
                    }
                }
                ?>
            </select>
        </label><br><br>
        <input type="hidden" name="update_id" value="<?= $_GET['update_id'] ?>">
        <input type="hidden" name="author" value="<?= $_SESSION['id'] ?>">
        <input type="submit" value="Обновить задачу" name="update_new_task">
    </form>
<?php } else { ?>
    <form action="taskList.php" method="get">
        <label> Описание задачи <br>
            <textarea name="description" cols="30" rows="10"></textarea>
        </label><br><br>
        <label> Закрепить за пользователем <br>
            <select name="user">
                <option value="0">Моя задача</option>
                <?php
                foreach ($users as $user) {
                    if ($_SESSION['login'] !== $user['login']) {
                        echo '<option value="' . $user['id'] . '" >' . $user['login'] . '</option>';
                    }
                }
                ?>
            </select>
        </label><br><br>
        <input type="hidden" name="author" value="<?= $_SESSION['id'] ?>">
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
<table style="float:left;margin: 15px">
    <thead>
    <tr>
        <th>Описание</th>
        <th>Дата</th>
        <th>Статус</th>
        <th>Изменить</th>
        <th>Выполнить</th>
        <th>Удалить</th>
        <th>Исполнитель</th>
        <th>Создатель задачи</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($yourList as $item) { ?>
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
            <td><?php
                if (getLoginUser($users, $item['user']) == $_SESSION['login'] or getLoginUser($users, $item['user']) == null) {
                    echo 'Вы';
                } else {
                    echo getLoginUser($users, $item['user']);
                }
                ?></td>
            <td><?php
                if (getLoginUser($users, $item['author']) == $_SESSION['login'] or getLoginUser($users, $item['author']) == null) {
                    echo 'Вы';
                } else {
                    echo getLoginUser($users, $item['author']);
                }
                ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<table style="float:left;margin: 15px">
    <thead>
    <tr>
        <th>Описание</th>
        <th>Дата</th>
        <th>Статус</th>
        <th>Изменить</th>
        <th>Выполнить</th>
        <th>Удалить</th>
        <th>Исполнитель</th>
        <th>Создатель задачи</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($otherList as $item) { ?>
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
            <td><?php
                if (getLoginUser($users, $item['user']) == $_SESSION['login'] or getLoginUser($users, $item['user']) == null) {
                    echo 'Вы';
                } else {
                    echo getLoginUser($users, $item['user']);
                }
                ?></td>
            <td><?php
                if (getLoginUser($users, $item['author']) == $_SESSION['login'] or getLoginUser($users, $item['author']) == null) {
                    echo 'Вы';
                } else {
                    echo getLoginUser($users, $item['author']);
                }
                ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>