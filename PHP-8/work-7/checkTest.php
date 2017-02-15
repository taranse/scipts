<?php


$err = false;
$test = json_decode($_POST['json'], true);
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
?><br>
<img src="http://irstorm.16mb.com/resource/captcha.php?name=<?= $_POST['name']; ?>" alt="">