<?php 
defined("BASEURL") OR die("Direct access denied");
/**
* -----------------------------------------/
* Helper Functions                         /
*------------------------------------------/
*										   /
* To use function:- call function name	   /
*	@example functionName($parameter);	   /
*										   /
*******************************************/


function customError($errno, $errstr) {
   echo "<b>Error:</b> [$errno] $errstr<br>";
   echo "Ending Script";
   die();
 } 


function redirect($path) {
    header("Location: " . URL.$path);
} 

// strip slashes
function stripSlash($var) {
    if (get_magic_quotes_gpc()) {
        $var = stripslashes($var);
    }
    return $var;
}
//Sanitize strings
function sanitizeString($var) {
    $var = stripSlash($var);
	$var = strip_tags($var);
	$var = htmlentities($var);
	return $var;
}

// convert row html tags into html entities.
function sanitizeHtml($var) {
    $var = stripSlash($var);
    return $var = htmlentities($var);
}

// creates a 32 hexadecimal string.
function hasher($string) {
	return hash("ripemd128", $string);
}

function mdHasher($string) {
    return md5($string);
}

function clearSpaces($var) {
    $var = preg_replace("/\s\s+/", "", $var);
	$var = trim($var);
	return $var;
}


/**
* stringGen function
*----------------------------------------------------------
* @return random generated strings of alphabet and numbers.
* @param expect to be integer. i.e the number of character to output.
* 	@example stringGen::code(6, 12); 
*		`parameter 1 = minimum character length.
*		`parameter 2 = maximum character length.
**/
function codeGen($string) {
    $char = "abcdegijklmnpqrstuvwxyzABCDEFGHIJKMNOPQRSTVWXWZ023456789";
    $count = strlen($char);
    srand((double)microtime()*1000000);
    $str = "";

    for ($i = 0; $i <= $string; ++$i) {
        $num = rand() % $count;
        $tmp = substr($char, $num, 1);
        $str = $str . $tmp;
    }
    return $str;
}

// set array value to lower case
function arrayLowerCase(array $data) {
    $arrayKey = [];
    $arrayValue = [];
    foreach ($data as $key => $value) {
        $value = strtolower($value);
        array_push($arrayKey, $key);
        array_push($arrayValue, $value);
    }
    $newData = array_combine($arrayKey, $arrayValue);
    return $newData;
}

// set array value to upper case
function arrayUpperCase(array $data) {
    $arrayKey = [];
    $arrayValue = [];
    foreach ($data as $key => $value) {
        $value = strtoupper($value);
        array_push($arrayKey, $key);
        array_push($arrayValue, $value);
    }
    $newData = array_combine($arrayKey, $arrayValue);
    return $newData;
}








?>