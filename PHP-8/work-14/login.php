<?php
if (defined(URL_MAIN) or $_SERVER['SCRIPT_NAME'] !== URL_MAIN . 'index.php') {
    header("location: /PHP-8/work-14/index.php");
}
function isNotEmptyGet($param = null)
{
    return !empty($_GET[$param]);
}

$server = "localhost";
$base = "test";
$db = new PDO("mysql:host=$server;dbname=$base", 'root', '');


$regLogin = isNotEmptyGet('reg_login') ? $_GET['reg_login'] : '';
$login = isNotEmptyGet('login') ? $_GET['login'] : '';


if (!empty($_GET)) {
    if (isNotEmptyGet('log')) {
        $user = $db->prepare('SELECT * FROM users WHERE login = ?');
        $user->execute([$_GET['login']]);

        if (!empty($user->fetchObject())) {
            print_r($user->fetchObject());
            $_SESSION['user_login'] = true;
            $_SESSION['login'] = $_GET['login'];
            header('location:' . $_SERVER['HTTP_REFERER']);


        } else {
            echo '<br><b>Неправильный логин или пароль</b>';
        }

    } else if (isNotEmptyGet('reg')) {
        if (
            (!isNotEmptyGet('reg_password') or !isNotEmptyGet('repeat_password')) or
            $_GET['reg_password'] !== $_GET['repeat_password']
        ) {
            echo 'Пароли не совпадают';
        } else {
            $user = $db->prepare('SELECT * FROM users WHERE login = ?');
            $user->execute([$_GET['reg_login']]);
            if (empty($user->fetch())) {
                $db
                    ->prepare('INSERT INTO users (login, password) VALUE (?, ?)')
                    ->execute([
                        $_GET['reg_login'],
                        md5($_GET['reg_password'])
                    ]);

                $_SESSION['user_login'] = true;
                $_SESSION['login'] = $_GET['reg_login'];
                header('location:' . $_SERVER['HTTP_REFERER']);

            }

        }
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
