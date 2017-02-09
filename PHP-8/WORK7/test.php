<?php

$test = file_get_contents('http://university.netology.ru/user_data/plyakin/work-7/tests/' . $_GET['file'] );
$json = json_decode($test);
if(empty(json_decode($test))) {
	header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
}
echo 'Загруженный тест<br>';
echo $test;