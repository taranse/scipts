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
	<form enctype="multipart/form-data" action="http://university.netology.ru/user_data/plyakin/work-7/upload.php" method="POST">
		Загрузить тест: <input name="test" type="file"><br>
		<input type="submit" value="Отправить">
	</form>
</body>
</html>