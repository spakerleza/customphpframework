<?php 

/**
* cookie class
*---------------------------------------------------------
* set cookies name and variables.
* 	@return cookie name.
* destroy cookie variables or all cookies in the server.
* @param- $key represents the cookie name.
* @param- $value represents the cookie value.
*/

class Cookie 
{
	private function __construct() { }
	private function __clone() { }

	//set cookie to 1 month.
	public static function set($key, $value) {
		setcookie($key, $value, time() + 60 * 60 * 24 * 31, "/");
	}
	//get cookie.
	public static function get($key) {
		if (isset($_COOKIE[$key])) {
			return $_COOKIE[$key];
		}
	}
	//destroy selected cookie.
	public static function terminate($key, $value) {
		if (isset($_COOKIE[$key])) {
			setcookie($key, $value, time() - 60 * 60 * 24 * 31, "/");
		}
	}
	//destroy all cookie. (Should be use for debugging purposes only.) 
	public static function terminateAll() {
		if (isset($_SERVER['HTTP_COOKIE'])) {
		    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
		    foreach($cookies as $cookie) {
		        $parts = explode('=', $cookie);
		        $name = trim($parts[0]);
		        setcookie($name, '', time() - 60 * 60 * 24 * 31);
		        setcookie($name, '', time() - 60 * 60 * 24 * 31, '/');
		    }
		}
	}
}



?>