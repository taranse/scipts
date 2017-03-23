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
        $this->queryParams = [];
        $this->queryParams['table'] = $tableName;
        return $this;
    }

    public function set($array = null)
    {
        $valueTypes = [];
        foreach ($array as $key => $value) {
            if ($value == 'NOW()') {
                $valueTypes[] = $key . ' = ' . $value;
            } else {
                if (gettype($value) == 'string') {
                    $valueTypes[] = $key . ' = ' . '"' . $value . '"';
                } else if (gettype($value) == 'integer') {
                    $valueTypes[] = $key . ' = ' . $value;
                } else {
                    $valueTypes[] = $key . ' = ' . $value;
                }
            }
        }
        $this->queryParams['set'] = ' SET ' . implode(", ", $valueTypes);
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
        $valueTypes = [];
        foreach ($array as $key => $value) {
            if ($value == 'NOW()') {
                $valueTypes[] = $key . ' = ' . $value;
            } else {
                if (gettype($value) == 'string') {
                    $valueTypes[] = $key . ' = ' . '"' . $value . '"';
                } else if (gettype($value) == 'integer') {
                    $valueTypes[] = $key . ' = ' . $value;
                } else {
                    $valueTypes[] = $key . ' = ' . $value;
                }
            }
        }
        $this->queryParams['where'] = ' WHERE ' . implode(" AND ", $valueTypes);
        return $this;
    }

    public function update()
    {
        $query = $this->queryParams;
        print_r('UPDATE ' . $query['table'] . $query['set'] . $query['where']);
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

    public function delete()
    {
        $query = $this->queryParams;
        $this->db->query('DELETE FROM ' . $query['table'] . $query['where']);
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
