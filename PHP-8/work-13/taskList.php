<?php

function updateWithId($db, $sql, $array)
{
    $db->prepare($sql)->execute($array);
    $url = parse_url($_SERVER['HTTP_REFERER']);
    header('location:' . $url['path']);
}

$server = "localhost";
$base = "test";

$db = new PDO("mysql:host=$server;dbname=$base", 'root', '');

if (!empty($_GET['insert_new_task'])) {
    $data = array($_GET['description'], 0, date("Y-m-d H:i:s"));
    $sql = "INSERT INTO tasks (description, is_done, date_added) VALUES (?, ?, ?)";

    $db->prepare($sql)->execute($data);

    header('location:' . $_SERVER['HTTP_REFERER']);
}

if (!empty($_GET['id'])) {
    updateWithId(
        $db,
        "UPDATE tasks SET is_done = 1 WHERE id = ?",
        [
            (int)$_GET['id']
        ]
    );
}

if (!empty($_GET['del'])) {
    updateWithId(
        $db,
        "DELETE FROM tasks WHERE id = ?",
        [
            (int)$_GET['del']
        ]
    );
}
if (!empty($_GET['update_new_task'])) {
    updateWithId(
        $db,
        "UPDATE tasks SET is_done = 0, description = :description WHERE id = :id",
        [
            'id' => (int)$_GET['update_id'],
            'description' => $_GET['description']
        ]
    );
}