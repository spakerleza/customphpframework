<?php 


/**
* encrypt class
*------------------------------------
* Get inputed password
* Get user browser and IP address
* convert to 32 hexadecimal characters
* @return converted characters.
*	@see function_helper for hasher();
*
* None of the salt must be changed;
**/
class encrypt 
{
	private function __construct() {}
	private function __clone() {}

	public static function hash($var) {
		$salt1  = "!@#)0$$^%@NXJAS_+_(*HANM<>s4$77)(jhjjjjlh%%%***jd*++(*^T+12&54/*sRGA^&";
		$salt2  = "@#$^&(BXVDA54/++-*||sjU^^^&8$$^@Jdjdjd88888(++)&NQZ!#@#$???XWTJX";
		$token  = hasher("$salt1$var$salt2");  
		return $token;
	}

	public static function ip() {
		$browser   = $_SERVER["HTTP_USER_AGENT"];
		$visitorIp = $_SERVER["REMOTE_ADDR"];
		$token 	   = hasher("$browser$visitorIp");
		return $token;
	}

	public static function pass($pass) {
		return  password_hash($pass, PASSWORD_DEFAULT);
	}

	public static function verifypass($pass, $hash) {
		
		if (password_verify($pass, $hash)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}


?>