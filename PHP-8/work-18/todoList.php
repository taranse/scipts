<?php

require 'db.php';
require 'controller/TaskListController.php';
require 'model/TaskList.php';
$url = parse_url($_SERVER['REQUEST_URI']);

$taskList = new TaskListController(new TaskList($db));
$sort = !empty($_GET['sort']) ? $_GET['sort'] : 'id';

$taskList->setSessionId();
$list = $taskList->getAllYourList($sort);
$cropList = $taskList->cropList($sort);
$users = $taskList->getUsers();

$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, ['cache' => './tmp/cache']);
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
if (!empty($_GET['update_id'])) {

    $insert = $twig->load('insert.twig');
    echo $insert->render([
        'yourId' => $_SESSION['id'],
        'users' => $users,
        'action' => 'update',
        'yourLogin' => $_SESSION['login'],
        'update_id' => $_GET['update_id'],
        'author' => $taskList->getListItem($list, $_GET['update_id'])['author'],
        'description' => $taskList->getListItem($list, $_GET['update_id'])['description'],
        'itemId' => $taskList->getListItem($list, $_GET['update_id'])['id'],
        'userLogin' => $taskList->getListItem($list, $_GET['update_id'])['user']
    ]);
    ?>
<!--    <form action="taskList.php" method="get">-->
<!--        <label> Описание задачи <br>-->
<!--            <textarea name="description" cols="30"-->
<!--                      rows="10">--><?//= $taskList->getListItem($list, $_GET['update_id'])['description'] ?><!--</textarea>-->
<!--        </label><br><br>-->
<!--        <label> Закрепить за пользователем <br>-->
<!--            <select name="user">-->
<!--                <option value="0"-->
<!--                    --><?php //if ($taskList->getListItem($list, $_GET['update_id'])['author'] == 0) echo 'selected' ?>
<!--                >Моя задача-->
<!--                </option>-->
<!--                --><?php
//                foreach ($users as $user) {
//                    if ($taskList->getListItem($list, $_GET['update_id'])['id'] !== 0) {
//                        echo '<option value="' . $user['id'] . '" >' . $user['login'] . '</option>';
//                    }
//                }
//                ?>
<!--            </select>-->
<!--        </label><br><br>-->
<!--        <input type="hidden" name="update_id" value="--><?//= $_GET['update_id'] ?><!--">-->
<!--        <input type="hidden" name="author" value="--><?//= $_SESSION['id'] ?><!--">-->
<!--        <input type="submit" value="Обновить задачу" name="update_new_task">-->
<!--    </form>-->
<?php } else {
    $insert = $twig->load('insert.twig');
    echo $insert->render([
        'yourId' => $_SESSION['id'],
        'users' => $users,
        'action' => 'insert',
        'yourLogin' => $_SESSION['login'],
    ]);
} ?>
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
<?php
$table = $twig->load('table.twig');
echo $table->render([
    'list' => $cropList["yourList"],
    'update_id' => !empty($_GET['update_id']) ? $_GET['update_id'] : null,
    'username' => $taskList->getLoginUser($users, $cropList["yourList"], 'user'),
    'authorname' => $taskList->getLoginUser($users, $cropList["yourList"], 'author'),
    'yourLogin' => $_SESSION['login']
]);
echo $table->render([
    'list' => $cropList["otherList"],
    'update_id' => !empty($_GET['update_id']) ? $_GET['update_id'] : null,
    'username' => $taskList->getLoginUser($users, $cropList["otherList"], 'user'),
    'authorname' => $taskList->getLoginUser($users, $cropList["otherList"], 'author'),
    'yourLogin' => $_SESSION['login']
]);
?>
</body>
</html>