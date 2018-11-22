<?php

class session {
	private $loged_in=false;
	public $user_id;
	
	function __construct(){
		session_start();
		$this->check_login();
	}
	
	public static function is_loged_in(){
		$abshir = new self;
		return $abshir->loged_in;
	}
	
	static function login($user){
		$abshir = new self;
		$abshir->user_id = $_SESSION['user_id'] = $user->id;
		$abshir->loged_in = true;
	}
	
	static function logout(){
		unset($this->user_id);
		unset($_SESSION['user_id']);
		$this->loged_in = false;
	}
	
	private function check_login(){
		if(isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];
			$this->loged_in = true;
		} else {
		    unset($this->user_id);
			$this->loged_in=false;
		}
	}
	
}




?>