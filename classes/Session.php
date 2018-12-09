<?php
//Class session with multiple methods like start, stop, get and set session
class Session {
	public static function start(){
		if(!isset($_SESSION)){
			session_start();
		}
	}
	public static function stop(){
		self::start();
		foreach($_SESSION as $k=>$v){
			unset($_SESSION);
		}
	}
	public static function get($key,$defaul=null){
		self::start();
		if(isset($_SESSION[$key])) return $_SESSION[$key];
		else return $default;
	}
	public static function set($key,$value){
		self::start();
		$_SESSION[$key] = $value;
	}
}