<?php
function getAge($y, $m, $d)
{
    if ($m > date('m') || $m == date('m') && $d > date('d')) {
        return (date('Y') - $y - 1);

    } else {
        return (date('Y') - $y);
    }
}

$name = 'Евгений';
$age = getAge(1995, 1, 2);
$email = 'bboy.stenli@yandex.ru';
$city = 'Москва';
$description = 'Ведущий программист в компании БиСиДжи';