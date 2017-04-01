<?php

session_start();
class AuthorizeController
{

    public function __construct($authorize)
    {
        $this->model = $authorize;
    }

    public function login($login, $password)
    {

        if (!empty($this->model->getUser($login, $password))) {
            $_SESSION['user_login'] = true;
            $_SESSION['login'] = $login;
            header('location:' . $_SERVER['HTTP_REFERER']);

        } else {
            echo '<br><b>Неправильный логин или пароль</b>';
        }

    }

    public function register($regLogin, $regPassword, $repeatPassword)
    {

        if ((!$this->isNotEmptyGet('reg_password') or !$this->isNotEmptyGet('repeat_password')) or $regPassword !== $repeatPassword) {
            echo 'Пароли не совпадают';
        } else {
            if (empty($this->model->getUser($regLogin, $regPassword))) {
                $this->model->regNewUser($regLogin, $regPassword);
                $_SESSION['user_login'] = true;
                $_SESSION['login'] = $regLogin;
                header('location:' . $_SERVER['HTTP_REFERER']);

            }

        }

    }

    public function isNotEmptyGet($param = null)
    {
        return !empty($_GET[$param]);
    }
}