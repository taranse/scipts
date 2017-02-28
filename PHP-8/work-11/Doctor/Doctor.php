<?php

namespace Doctor;


class Doctor
{

    public $name;
    private $patients = [];

    public function __construct($name)
    {
        if (!empty($name)) {
            $this->name = 'Доктор ' . $name;
        } else {
            $this->name = 'Доктор';
        }
    }

    public function enterPatient($patient)
    {
        if ($patient->doctor == null) {
            if (in_array($patient, $this->patients)) {
                echo 'Вы уже приняли этого пациента';
                echo PHP_EOL;
            } else {
                $this->patients[$patient->name] = $patient;
                $patient->doctor = $this->name;
            }
        } else {
            echo "Пациент '$patient->name' был принят другим доктором";
            echo PHP_EOL;
        }
    }

    public function writingRecipe($massiveMedicine, $patient)
    {
        if (in_array($patient, $this->patients)) {
            $patient->recipes = $massiveMedicine;
            echo "'$this->name' выписал рецепт пациенту '$patient->name'";
            echo PHP_EOL;
            $patient->enterMedicine();
        } else {
            echo "Пациента '$patient->name' нет в вашем списке";
            echo PHP_EOL;
        }
    }
}