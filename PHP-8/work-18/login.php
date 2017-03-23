<?php


require 'db.php';
require 'model/Authorize.php';
require 'controller/AuthorizeController.php';

$authorize = new Authorize($db);
$auth = new AuthorizeController($authorize);


function isNotEmptyGet($param = null)
{
    return !empty($_GET[$param]);
}

$regLogin = isNotEmptyGet('reg_login') ? $_GET['reg_login'] : '';
$login = isNotEmptyGet('login') ? $_GET['login'] : '';
$password = isNotEmptyGet('password') ? $_GET['password'] : '';
$regPassword = isNotEmptyGet('reg_password') ? $_GET['reg_password'] : '';
$repeatPassword = isNotEmptyGet('repeat_password') ? $_GET['repeat_password'] : '';




if (!empty($_GET)) {
    if (isNotEmptyGet('log')) {

        $auth->login($login, $password);

    } else if (isNotEmptyGet('reg')) {

        $auth->register($regLogin, $regPassword, $repeatPassword);

    }
}
?>

<h3>Вход</h3>
<form>
    <label>Логин: <br>
        <input type="text" name="login" pattern="[aA-zZ]{3,20}" required value="<?= $login ?>">
    </label><br><br>
    <label>Пароль: <br>
        <input type="password" required name="password">
    </label><br><br>
    <input type="submit" name="log" value="Войти">
</form>
<br>
<h3>Регистрация</h3>
<form>

    <label>Логин: <br>
        <input type="text" required pattern="[aA-zZ]{3,20}" name="reg_login" value="<?= $regLogin ?>">
    </label><br><br>
    <label>Пароль: <br>
        <input type="password" required name="reg_password">
    </label><br><br>
    <label>Повторите пароль: <br>
        <input type="password" required name="repeat_password">
    </label><br><br>
    <input type="submit" name="reg" value="Регистрация">
</form>
