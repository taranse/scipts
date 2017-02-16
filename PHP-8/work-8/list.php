<?php 

session_start();
if(empty($_SESSION['TYPE'])){
    header('location: http://university.netology.ru/user_data/plyakin/work-8/');
} 

if(!empty($_COOKIE['Ban'])){
	exit('Вы забанены, зайдите позже');
}
?>
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
		<a href="http://university.netology.ru/user_data/plyakin/work-8/test.php?file=<?= $file ?>">
			<?= $file ?>
		</a><br>
		<?php
	}
	?>
	<br>
	<br>
	<?php if($_SESSION['TYPE'] == 'admin'){ ?>
	<a href="http://university.netology.ru/user_data/plyakin/work-8/admin.php">Загрузить новый</a>
	<?php }else{ ?>
    <?= $_SESSION['NAME']; ?>    
	<a href="http://university.netology.ru/user_data/plyakin/work-8/autorization.php?logout=true">Выйти</a>
    <?php } ?>
</body>
</html>