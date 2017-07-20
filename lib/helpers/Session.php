<?php 


/**
* session class
*---------------------------------------------------------
* set session name and variables.
* 	@return session name.
* destroy session variables or all session in the server.
* @param- $key represents the session name.
* @param- $value represents the session value.
**/
class Session 
{
	private function __construct() { }
	private function __clone() { }
	
	//Initialize session.
	public static function init() {
		session_start();
	}
	//set session
	public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}
	//get session
	public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
	}
	//terminate selected session
	public static function terminate($key) {
		if (isset($_SESSION[$key])) {
			unset($_SESSION[$key]);
		}
	}
	//terminate all session. (Should be use for debugging purposes only.)
	public static function terminateAll() {
		session_destroy();
	}
}


?>