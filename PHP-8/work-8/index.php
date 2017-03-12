<?php
session_start();
if(!empty($_COOKIE['Ban'])){
	exit('Вы забанены, зайдите позже');
}
if(!empty($_SESSION['ERR_COUNT'])) {
    $errCount = $_SESSION['ERR_COUNT'];
}else{
    $errCount = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action="http://university.netology.ru/user_data/plyakin/work-8/autorization.php" method="post">
       <h3>Авторизоваться?</h3>
       <input type="hidden" name="type" value="admin">
        <label>Логин</label><br> <input type="text" name="login" required><br><br>
        <label>Пароль</label><br> <input type="password" name="password" required><br><br>
        <?php
		echo 'осталось попыток: ' . (10 - $errCount);
		if(isset($errCount) and $errCount > 4){ ?>
		<img src="captcha.jpg" alt=""><br>
			<label>Каптча</label><br> <input type="text" name="captcha" required><br><br>
		<?php }
		?>
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