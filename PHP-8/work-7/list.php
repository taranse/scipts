<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List JSON</title>
</head>
<body>
	<?php
	$filelist = glob("tests/*.json");
	echo '<h3>Список загруженных тестов</h3>';
	foreach($filelist as $file) {
		$file = explode('/', $file)[1];
		?>
		<a href="http://university.netology.ru/user_data/plyakin/work-7/test.php?file=<?= $file ?>">
			<?= $file ?>
		</a><br>
		<?php
	}
	?>
	<br>
	<br>
	<a href="http://university.netology.ru/user_data/plyakin/work-7/admin.php">Загрузить новый</a>
</body>
</html>