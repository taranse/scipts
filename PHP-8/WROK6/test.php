<?php

$test = @file_get_contents('http://university.netology.ru/user_data/plyakin/work-6/tests/' . $_GET['file'] );


print_r($test);