<?php 

/**
* sanitize class
*------------------------------------------
* Remove all illegal characters from @param.
* @return a sanitized value.
* 	@see function_helper for sanitizeString();
**/ 
class Sanitize 
{
	private function __construct() {}
	private function __clone() {}

	// clean strings
	public static function string($var) {
		$var = filter_var($var, FILTER_SANITIZE_STRING);
		$var = clearSpaces($var);
		$var = sanitizeString($var);

		return $var;
	}
	// clean array
	public static function array_data(array $var) {
		$filterValue = [];
		$valueKey    = [];

		foreach ($var as $key => $value) {
			$value = filter_var($value, FILTER_SANITIZE_STRING);
			$value = clearSpaces($value);
			$value = sanitizeString($value);

			array_push($valueKey, $key);
			array_push($filterValue, $value);
		}
			
		$filtered = array_combine($valueKey, $filterValue);
		return $filtered;
	}
	// clean email
	public static function email($email) {
		$email = clearSpaces($email);
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		return $email;
	}
	// clean url
	public static function url($url) {
		$url = clearSpaces($url);
		$url = filter_var($url, FILTER_SANITIZE_URL);
		return $url;
	}
	// enforce integer
	public static function int($num) {
		$num = (int)$num;
		$num = filter_var($num, FILTER_SANITIZE_NUMBER_INT);
		return (int)$num;
	}

	// enforce integer
	public static function floot($num) {
		$num = (int)$num;
		$num = filter_var($num, FILTER_SANITIZE_NUMBER_FLOAT);
		return $num;
	}
	// clean html post
	public static function html($str) {
		$str = clearSpaces($str);
		$str = sanitizeHtml($str);
		return $str;
	}

}

?>