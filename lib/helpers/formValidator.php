<?php
defined("BASEURL") OR die("Direct access denied");

// password validation
function validatePassword($field) {
	
	if (strlen($field) < 5) {
		return "Password must contain at least five characters";
	} /*elseif(preg_match("/[^A-Z0-9_.-\/@$%&*()=+]/", $field)) {
		return "Password must countain an upercase, number and a special character";
	}*/
	return "";
}

// validation username 
function validateUsername($field) {
	
	if (preg_match("/[^a-zA-Z0-9_.-]/")) {
		return "Username must contain valid characters";
		//return $error[0];
	}
	elseif (strlen($field) < 4) {
		return "Username nust be at least four characters";
		//return $error[1];
	} 
	return "";
}

// validate Name
function validateFullName($field) {
	
	if (preg_match("/[^a-zA-Z0-9 ._-]/", $field)) {
		return "Name must contain valid characters";
		//return $error;
	}
	return "";
}

// validate email address.
function validateEmail($field) {
	
	if (filter_var($field, FILTER_VALIDATE_EMAIL) === FALSE) {
		return "Invalid email address";
		//return $error;
	}
	elseif (!((strpos($field, "@") > 1) &&
	          (strpos($field, ".") > 0)) ||
	          preg_match("/[^a-zA-Z0-9.@_-]/", $field)){
	  return "Invalid email address";
	  //return $error;
	}
	return "";
}

// validate gender selection.
function validateGender($sex) {
	//global $LANG;

	switch ($sex) {
		case 'male': // passed

		case 'female': return ""; 
			break;
		
		default:
			return "Please select your gender";
			//return $error;
			break;
	}
}

// validate url
function validateUrl($url) {
	//global $LANG;

	if (filter_var($url, FILTER_VALIDATE_URL) === false) {
    	return "$url " . "is not a valid url";
		//return $url . " " . $error;
	} 
	return "";
}



?>