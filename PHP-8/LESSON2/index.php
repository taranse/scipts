<?php
error_reporting('E_ALL');
ini_set('display_errors', 1);

$numberOfUser = isset($_GET['x']) ? $_GET['x'] : rand(0,100);

echo 'Число пользователя = '.$numberOfUser;
echo '<br>';
    echo '<br>';

$numberOne = 1;
$numberTwo = 1;
$i = 0;
while(1){
    if($numberOne > $numberOfUser) {
        echo '<br>';
        echo 'Задуманное число <b>НЕ ВХОДИТ</b> в числовой ряд';
        break;
    }else if($numberOne == $numberOfUser){
        echo '<br>';
        echo 'Задуманное число <b>ВХОДИТ</b> в числовой ряд';
        break;
    }else{
        $numberThree = $numberOne;
        $numberOne += $numberTwo;
        echo 'Результат цикла - '.$numberThree.' + '.$numberTwo.' = '.$numberOne;
        $numberTwo = $numberThree;
    }
    $i++;
    echo '<br>';
}