<?php

class Computer
{
	public $volume = 1;
	public $chanel = 1;
	public $touchPadX = 50;
	public $touchPadY = 50;
	public static $power = false;
	
	public function keyUp($value) {
		if (self::power){
			echo $value;
		}
	}
	
	public static function $togglePower() {
		self::power ? self::power = false : self::power = true;
	}
	
	public function $restartPower(){			
		if (self::power){
			self::power = false;
			sleep(3);
			self::power = true;
		}	
	}	
	
	public function $changeChanel($chanel) {
		if ($chanel > 0 and $chanel < 100){			
			if (self::power){
				self::power == true;
			}
			$this->chanel = $chanel;
		}
	}
	
	public function $moveTouch($x, $y) {
		$this->touchPadX += $x;
		$this->touchPadY += $y;
	}
	
}