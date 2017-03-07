<?php

class Tv 
{
	public $volume = 1;
	public $chanel = 1;
	public $mute = false;
	public static $power = false;
	
	public static function $togglePower(){
		self::power ? self::power = false : self::power = true;
	}
	
	public function $muteToggle(){		
		if (self::power){
			$this->mute ? $this->mute = false : $this->mute = true;
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
	
	public function $chanelUp() {
		if (self::power){
			if($this->chanel < 99){
				$this->chanel++;
			}else{			
				$this->chanel = 0;
			}
		}
	}	
	
	public function $chanelDown() {
		if (self::power){
			if ($this->chanel > 0){
				$this->chanel--;
			}else{			
				$this->chanel = 99;
			}
		}
	}
	
	public function $volumeUp() {
		if (self::power){
			if ($value < 100) {
				$this->volume++;
			} 
		} 
	}
	
	public function $volumeDown() {
		if (self::power){
			if ($value > 0) {
				$this->volume--;
			} 
		} 
	}
}