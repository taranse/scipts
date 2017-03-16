<?php

class DataBase
{
    public $base = 'test';
    public $userName = 'root';
    public $userPassword = '';
    public $host = 'localhost';
    public $db;
    public $queryParams = [];

    public function __construct()
    {
        $this->db = new PDO("mysql:host=$this->host;dbname=$this->base", $this->userName, $this->userPassword);

    }

    public function useTable($tableName)
    {
        $this->queryParams = [];
        $this->queryParams['table'] = $tableName;
        return $this;
    }

    private function getObjectList($pdo)
    {
        $tables = [];
        foreach ($pdo as $table) {
            $tables[] = (object)$table;
        }
        return $tables;
    }

    public function showAllTables()
    {
        return $this->db->query("SHOW TABLES")->fetchAll();

    }

    public function showTableData($tableName)
    {
        return $this->db->query("DESCRIBE $tableName")->fetchAll();
    }


}
