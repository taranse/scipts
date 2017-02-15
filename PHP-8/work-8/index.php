<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
    <form action="http://university.netology.ru/user_data/plyakin/work-8/autorization.php" method="post">
       <h3>Авторизоваться?</h3>
       <input type="hidden" name="type" value="admin">
        <label>Логин</label><br> <input type="text" name="login" required><br><br>
        <label>Пароль</label><br> <input type="password" name="password" required><br><br>
        <input type="submit"><br><br>
    </form>
    <form action="http://university.netology.ru/user_data/plyakin/work-8/autorization.php" method="post">        
       <h4>Или войти как гость</h4>
       <input type="hidden" name="type" value="guest">
       <label>Имя</label> <input type="text" name="name" required>
        <input type="submit"><br><br>
    </form>
</body>
</html>