<?php
include 'DataBase.php';
$base = new DataBase();

if (!empty($_GET['insert_new_task'])) {
    $base
        ->useTable('tasks')
        ->values([
            'description' => htmlspecialchars($_GET['description']),
            'is_done' => 0,
            'date_added' => 'NOW()'
        ])
        ->insert('test');
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

if (!empty($_GET['id'])) {
    $base
        ->useTable('tasks')
        ->set([
            'is_done' => 1
        ])
        ->where([
            'id' => $_GET['id']
        ])
        ->update();
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

if (!empty($_GET['del'])) {
    $base
        ->useTable('tasks')
        ->where([
            'id' => $_GET['del']
        ])
        ->delete();
    header('location: ' . $_SERVER['HTTP_REFERER']);
}
if (!empty($_GET['update_new_task'])) {
    $base
        ->useTable('tasks')
        ->set([
            'is_done' => 0,
            'description' => htmlspecialchars($_GET['description']),
            'date_added' => 'NOW()'
        ])
        ->where([
            'id' => $_GET['update_id']
        ])
        ->update();
    header('location: ' . $_GET['successUrl']);
}