<?php

class Car 
{
	public $horsePower = 300;
	public $headlight = false;
	public static $lightOption = 1; //1 - ближний свет 2 - дальний свет 3 - противотуманки
	
	public function __consturct($power){
		$this->horsePower = $power;
	}
	
	public function headlightsSwitch(){//Кнопка включения света
		$this->$headlight ? $this->$headlight = false : $this->$headlight = true;
	}
	
	public function $lightOptionSwitch(){//Изменям тип света
		self::$lightOption == 3 ? self::$lightOption = 1 : self::$lightOption++;
	}
	
}