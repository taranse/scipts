<?php

class DataBase extends mysqli
{
    public $base = 'test';
    public $userName = 'root';
    public $userPassword = '';
    public $host = 'localhost';
    public $db;
    public $queryParams = [];

    public function __construct()
    {
        $this->db = new Mysqli($this->host, $this->userName, $this->userPassword, $this->base);
    }

    public function useTable($tableName)
    {
        $this->queryParams['table'] = $tableName;
        return $this;
    }

    public function set($array = null)
    {
        $setArray = [];
        foreach ($array as $key => $value) {
            $setArray[] = $key . ' = ' . $value;
        }
        $this->queryParams['set'] = ' SET ' . implode(", ", $setArray);
        return $this;
    }


    public function values($array = null)
    {
        $valuesArray = [];
        $valueTypes = [];
        $valuesArray[0] = '(' . implode(', ', array_keys($array)) . ')';
        $valuesArray[1] = '(';
        foreach ($array as $value) {
            if ($value == 'NOW()') {
                $valueTypes[] = $value;
            } else {
                if (gettype($value) == 'string') {
                    $valueTypes[] = '"' . $value . '"';
                } else if (gettype($value) == 'integer') {
                    $valueTypes[] = $value;
                } else {
                    $valueTypes[] = $value;
                }
            }
        }
        $valuesArray[1] .= implode(', ', $valueTypes);
        $valuesArray[1] .= ')';
        $this->queryParams['values'] = implode(" VALUES ", $valuesArray);
        return $this;
    }

    public function where($array = null)
    {
        $whereArray = [];
        foreach ($array as $key => $value) {
            $whereArray[] = $key . ' = ' . $value;
        }
        $this->queryParams['where'] = ' WHERE ' . implode(" AND ", $whereArray);
        return $this;
    }

    public function update()
    {
        $query = $this->queryParams;
        $this->db->query('UPDATE ' . $query['table'] . $query['set'] . $query['where']);
    }

    public function order($array = null)
    {
        $orderArray = [];
        foreach ($array as $key => $value) {
            $orderArray[] = $key . ' ' . $value;
        }
        $this->queryParams['order'] = ' ORDER BY ' . implode(", ", $orderArray);
        return $this;
    }

    public function insert($table)
    {
        $query = $this->queryParams;
        $this->db->query('INSERT INTO ' . $query['table'] . ' ' . $query['values']);
    }

    public function getList($array = null)
    {
        $return = [];
        $query = $this->queryParams;
        if ($result = $this->db->query('SELECT * FROM ' . $query['table'] . $query['order'])) {
            while ($row = $result->fetch_object()) {
                $return[] = $row;
            }
        }
        return $return;
    }
}
