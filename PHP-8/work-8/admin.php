<?php
session_start();
if(empty($_SESSION['TYPE'])){
    header('location: http://university.netology.ru/user_data/plyakin/work-8/');
}else if($_SESSION['TYPE'] != 'admin'){
    header($_SERVER['SERVER_PROTOCOL']." 403");
    exit('НЕ АВТОРИЗОВАН');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JSON FILES</title>
</head>
<body>
	<?php
	echo (isset($_GET['err']) and $_GET['err']) ? '<p>Загрузить файл формата JSON</p>' : '<br><br>';
	?>
	<form enctype="multipart/form-data" action="http://university.netology.ru/user_data/plyakin/work-8/upload.php" method="POST">
		Загрузить тест: <input name="test" type="file"><br>
		<input type="submit" value="Отправить">
	</form>
	<br>
	<br>
	<h3><?= $_SESSION['NAME']; ?></h3>
	<a href="http://university.netology.ru/user_data/plyakin/work-8/autorization.php?logout=true">Выйти</a>
</body>
</html>