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
		$file = explode('/test-', $file)[1];
		$link = explode('.', $file)[0];
		?>
		<a href="http://university.netology.ru/user_data/plyakin/work-7/test.php?file=<?= $link ?>">
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