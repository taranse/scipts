<?php

session_start();

class TaskListController
{
    public function __construct($taskList)
    {
        $this->model = $taskList;
    }

    public function getListItem($list, $id)
    {
        $id = (int)$id;
        foreach ($list as $key => $item) {
            if ($id == $item['id']) {
                return $list[$key];
            }
        }
        return [];
    }

    public function getIdUser($users, $login)
    {
        foreach ($users as $user) {
            if (strtolower($user['login']) == $login) return $user['id'];
        }
        return null;
    }

    public function getLoginUser($users, $list, $param)
    {
        $usersTask = [];
        foreach ($list as $item) {
            if($item[$param] == 0) $usersTask[] = $_SESSION['login'];
            foreach ($users as $user) {
                if($user['id'] == $item[$param]) $usersTask[] = $user['login'];
            }
        }
        return $usersTask;
    }

    public function setSessionId()
    {
        $_SESSION['id'] = $this->getIdUser($this->model->getUsers(), strtolower($_SESSION['login']));
    }

    public function getUsers()
    {
        return $this->model->getUsers();
    }

    public function getAllYourList($sort)
    {
        return $this->model->allYourList($sort);
    }

    public function isYourItem($item)
    {
        return $item['author'] == $_SESSION['id'];
    }

    public function cropList($sort)
    {
        $list = $this->getAllYourList($sort);
        if (!count($list)) {
            $list = [];
        }
        $yourList = [];
        $otherList = [];
        foreach ($list as $item) {
            if ($this->isYourItem($item)) {
                $yourList[] = $item;
            } else {
                $otherList[] = $item;
            }
        }
        return ["yourList" => $yourList, "otherList" => $otherList];
    }
}