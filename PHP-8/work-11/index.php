<?php
require "autoload.php";

use Medicine\Medicine;
use Doctor\Doctor;
use Patient\Patient;

$patients = [
    'patient1' => 'Евгений',
    'patient2' => 'Егор',
    'patient3' => 'Анастасия',
    'patient4' => 'Дмитрий',
    'patient5' => 'Олег'
];

$medicines = [
    'medicine1' => 'Стрепсилс',
    'medicine2' => 'Називин',
    'medicine3' => 'Афлубин',
    'medicine4' => 'Нурофен',
    'medicine5' => 'Цитромон',
    'medicine6' => 'Парацетамол'
];

$doctor1 = new Doctor('Денис Осипов');
$doctor2 = new Doctor('Андрей Стебелев');

foreach ($patients as $key => $patient) {
    $$key = new Patient($patient);
}

foreach ($medicines as $key => $medicine) {
    $$key = new Medicine($medicine);
}

$doctor1->enterPatient($patient1);
$doctor1->enterPatient($patient4);
$doctor1->enterPatient($patient5);

$doctor2->enterPatient($patient1);
$doctor2->enterPatient($patient2);

$doctor1->writingRecipe([$medicine1, $medicine4, $medicine2], $patient1);
$doctor2->writingRecipe([$medicine2, $medicine3, $medicine4], $patient1);
$doctor2->writingRecipe([$medicine5, $medicine6, $medicine1], $patient2);
