<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JSON FILES</title>
</head>
<body>
	<form enctype="multipart/form-data" action="http://university.netology.ru/user_data/plyakin/work-7/upload.php" method="POST">
		<h2>Тест, на знание JavaScript</h2>
		<div>
			<h4>Как вывести информация в консоль?</h4>
			<input type="radio" id="firstAnsver1-1" name="firstAnsver" value="1" required> <b><label for="firstAnsver1-1">console.log()</label></b><br>
			<input type="radio" id="firstAnsver1-2" name="firstAnsver" value="2" required> <b><label for="firstAnsver1-2">console()</label></b><br>
			<input type="radio" id="firstAnsver1-3" name="firstAnsver" value="3" required> <b><label for="firstAnsver1-3">log.console()</label></b><br>
			<br>
		</div>
		<div>
			<h4>Как создать переменную?</h4>
			<input type="radio" id="secondAnsver1-1" name="secondAnsver" value="1" required> <b><label for="secondAnsver1-1">int name</label></b><br>
			<input type="radio" id="secondAnsver1-2" name="secondAnsver" value="2" required> <b><label for="secondAnsver1-2">$name = null</label></b><br>
			<input type="radio" id="secondAnsver1-3" name="secondAnsver" value="3" required> <b><label for="secondAnsver1-3">var name</label></b><br>
			<br>
		</div>
		<div>
			<h4>Как создать функцию</h4>
			<input type="radio" id="thirdAnsver1-1" name="thirdAnsver" value="1" required> <b><label for="thirdAnsver1-1">myFunc (){}</label></b><br>
			<input type="radio" id="thirdAnsver1-2" name="thirdAnsver" value="2" required> <b><label for="thirdAnsver1-2">function myFunc(){}</label></b><br>
			<input type="radio" id="thirdAnsver1-3" name="thirdAnsver" value="3" required> <b><label for="thirdAnsver1-3">function (){myFunc}</label></b><br>
			<br>
		</div>
		<input type="submit" value="Отправить тест">
	</form>
</body>
</html>