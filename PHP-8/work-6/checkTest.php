<?php

$test = file_get_contents('http://university.netology.ru/user_data/plyakin/work-6/tests/test-' . $_POST['json'] . '.json' );

$err = false;
$test = json_decode($test, true);
foreach($test as $key => $question) {
    if($question['answer'] != $_POST[$key]) {
        $err = true;
        break;
    }
}

if ($err) {
    echo ' УВЫ, ВЫ НЕ ПРОШЛИ ТЕСТ ';
} else {
   echo ' ПОЗДРАВЛЯЕМ, ТЕСТ УСПЕШНО ПРОЙДЕН ' ;
}