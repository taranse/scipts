<?php
session_start();
$_SESSION['count_success'] = !empty($_SESSION['count_success']) ? $_SESSION['count_success'] : 0;
$test = file_get_contents('http://university.netology.ru/user_data/plyakin/work-7/tests/test-' . $_POST['json'] . '.json');

$err = false;
$test = json_decode($test, true);
foreach ($test as $key => $question) {
    if ($question['answer'] != $_POST[$key]) {
        $err = true;
        break;
    }
}

if ($err) {
    echo ' УВЫ, ВЫ НЕ ПРОШЛИ ТЕСТ ';
} else {
    $_SESSION['count_success']++;
    echo ' ПОЗДРАВЛЯЕМ, ТЕСТ УСПЕШНО ПРОЙДЕН ';
    ?><br>
    <img src="http://irstorm.16mb.com/resource/captcha.php?name=<?= $_POST['name']; ?>&count=<?= $_SESSION['count_success'] ?>"
         alt="">
<?php } ?>
<br><br>
<a href="http://university.netology.ru/user_data/plyakin/work-7/list.php">Список тестов</a>
