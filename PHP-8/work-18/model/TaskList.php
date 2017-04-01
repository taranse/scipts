<?php

session_start();
class TaskList
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUsers()
    {
        return $this->db->query("SELECT * FROM users")->fetchAll();
    }

    public function allYourList($sort)
    {
        $sql = "SELECT * FROM tasks 
                WHERE author = " . $_SESSION['id'] . " or user = " . $_SESSION['id'] . "
                ORDER BY $sort DESC";
        return $this->db->query($sql)->fetchAll();
    }

}