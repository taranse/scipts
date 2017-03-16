<?php

include 'DataBase.php';

$pdo = new DataBase();
$tables = $pdo->showAllTables();

function mappingTables($array)
{
    return $array[0];
}

$tablesName = array_map('mappingTables', $tables);

$cmd = $_GET['cmd'];
$tableName = $_GET['table'];


switch ($cmd) {
    case 'getTable': {
        if (in_array($tableName, $tablesName)) {
            echo json_encode($pdo->showTableData($tableName));
        }
    }
        break;
}