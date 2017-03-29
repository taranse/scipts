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
    if(!$filelist) {
        echo 'Нет тестов';
    } else {
        foreach($filelist as $file) {
            $file = explode('/test-', $file)[1];
            $link = explode('.', $file)[0];
            ?>
            <a href="http://university.netology.ru/user_data/plyakin/work-8/test.php?file=<?= $link ?>">
                <?= $file ?>
            </a> &nbsp; - &nbsp; <a href="http://university.netology.ru/user_data/plyakin/work-8/delete.php?file=<?= $link ?>">Удалить</a><br><br>
            <?php
        }
    }	
	?>
	<br><br>
	<br>
	<?php if($_SESSION['TYPE'] == 'admin'){ ?>
	<a href="http://university.netology.ru/user_data/plyakin/work-8/admin.php">Загрузить новый</a>
	<?php }else{ ?>
    <?= $_SESSION['NAME']; ?>    
	<a href="http://university.netology.ru/user_data/plyakin/work-8/autorization.php?logout=true">Выйти</a>
    <?php } ?>
</body>
</html>