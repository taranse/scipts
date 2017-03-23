<?php

class Authorize
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUser($login, $password)
    {
        $user = $this->db->prepare('SELECT login FROM users WHERE login = ? AND password = ?');
        $user->execute([$login, md5($password)]);
        return $user->fetchObject();
    }

    public function regNewUser($login, $password)
    {
        $this->db
            ->prepare('INSERT INTO users (login, password) VALUE (?, ?)')
            ->execute([$login, md5($password)]);
    }
}