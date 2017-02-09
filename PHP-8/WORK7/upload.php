<?php
$json = json_encode($_POST);


$filelist = glob("tests/*.json");
if (!$filelist) {
	$fp = fopen(__DIR__ . "/tests/test-1.json", "w");
}else{
	$first = array_reverse($filelist)[0];
	preg_match("|[0-9]|U", $first, $out);
	$fp = fopen(__DIR__ . "/tests/test-" . ($out[0] + 1) . ".json", "w");
}

fwrite($fp, $json);
fclose($fp);

if($_POST['firstAnsver'] == 1 and $_POST['secondAnsver'] == 3 and $_POST['thirdAnsver'] == 2) {
	echo '<h1><b>Вы успешно прошли тест!</b></h1>';
?>
	<h2>Введите имя</h2>	
	<form action="http://university.netology.ru/user_data/plyakin/work-7/diplom.php" method="POST">		
		<h3>И мы подарим вам сертификат</h3>
		<input type="text" name="name" placeholder="Имя" required pattern="[а-яА-Яa-Zz-A]{2,20}">
		<input type="submit" value="Получить диплом">
	</form>
<?php
}else{
	header('location: http://university.netology.ru/user_data/plyakin/work-7/list.php?status=err');
}