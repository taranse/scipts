<?php
include 'DataBase.php';
$base = new DataBase();

if (!empty($_GET['insert_new_task'])) {
    $base
        ->useTable('tasks')
        ->values([
            'description' => $_GET['description'],
            'is_done' => 0,
            'date_added' => 'NOW()'
        ])
        ->insert('test');
    header('location: ' . $_SERVER['HTTP_REFERER']);
}