<?php 
defined("BASEURL") OR die("Direct access denied");
/**
* Dictate unwanted URL direct inset
* and redirect user to error page.
**/
class illegal 
{
	private function __construct() {}
	private function __clone() {}

	public static function urlDetector() {
		if (!isset($_SERVER['HTTP_REFERER'])) {
			header('Location: ' . URL . "/errorPage");
          	exit;
        }
    }
}
?>