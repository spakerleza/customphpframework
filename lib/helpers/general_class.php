<?php 
defined("BASEURL") OR die("Direct access denied");
/**
* ---------------------------------------------------------------------------------------------------------------------------/
* Helper Classes                                    																		 /
*----------------------------------------------------------------------------------------------------------------------------/
* 																															 /
* All static class function __construct() and __clone() are set to private to prevent class duplication and auto execution.  /
* To use class:- call class name add :: prefix then the static method.														 /
*	@example className::staticMethod($parameter);																			 /
*      																														 /
* Some function used in the classes are from function_helper																 /
* @see function_helper.																										 /
*****************************************************************************************************************************/



class uploadError 
{
	private function __construct() {}
	private function __clone() {}

	public static function message($err) {
		switch ($code) {

            case UPLOAD_ERR_INI_SIZE:
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = "The uploaded file was only partially uploaded";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "No file was uploaded";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = "Missing a temporary folder";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = "Failed to write file to disk";
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = "File upload stopped by extension";
                break;

            default:
                $message = "Unknown upload error";
                break;
        }
        return $message; 
	}
}

?>