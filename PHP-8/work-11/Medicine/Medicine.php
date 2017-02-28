<?php
namespace Medicine;


class Medicine
{
    public $name;


    public function __construct($name)
    {
        if (!empty($name)) {
            $this->name = $name;
        } else {
            $this->name = null;
        }
    }

    public function drinkSelf()
    {
        echo 'Лекарство ' . $this->name . ' Выпито';
        echo PHP_EOL;
    }
}