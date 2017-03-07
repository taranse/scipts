<?php

class DataBase
{
    public $base = 'test';
    public $userName = 'root';
    public $userPassword = '';
    public $host = 'localhost';
    public $db;

    public function __construct()
    {
        $this->db = new Mysqli($this->host, $this->userName, $this->userPassword, $this->base);
    }

}