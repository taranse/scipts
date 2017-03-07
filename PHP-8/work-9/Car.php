<?php

class Car 
{
	public $horsePower = 300;
	public $headlight = false;
	public $radio = false;
	public $volume = 0;
	public static $lightOption = 1; //1 - ближний свет 2 - дальний свет 3 - противотуманки
	
	public function __consturct($power) {
		$this->horsePower = $power;
	}
	
	public function headlightsSwitch() {//Кнопка включения света
		$this->headlight ? $this->headlight = false : $this->headlight = true;
	}
	
	public function $lightOptionSwitch() {//Изменям тип света
		self::lightOption == 3 ? self::lightOption = 1 : self::lightOption++;
	}
	
	public function $radionSwitch() {
		if($this->radio){
			$this->radio = false;
			$this->volume = 0;
		}else{
			$this->radio = true;
			$this->volume = 5;
		}
	}
	
	public function $volumeChange($value) {
		if ($value < 0) {
			$this->volume = 0;
		} else if ($value > 100) {
			$this->volume = 100;
		} else {
			$this->volume = $value;
		}
	}
}