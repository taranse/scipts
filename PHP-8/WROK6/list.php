<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List JSON</title>
</head>
<body>
	<?php
	$filelist = glob("tests/*.json");
	foreach($filelist as $file) {
		$file = explode('/', $file)[1];
		?>
		<a href="http://university.netology.ru/user_data/plyakin/work-6/test.php?file=<?= $file ?>">
			<?= $file ?>
		</a><br>
		<?php
	}
	?>
</body>
</html>