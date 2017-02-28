<?php

namespace Patient;


class Patient
{
    public $name;
    public $recipes = [];
    public $doctor = null;

    public function __construct($name)
    {
        if (!empty($name)) {
            $this->name = $name;
        } else {
            $this->name = 'Пациент';
        }
    }

    public function enterMedicine()
    {
        foreach ($this->recipes as $recipe) {
            $recipe->drinkSelf();
        }
    }
}