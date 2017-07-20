<?php 
defined("BASEURL") OR die("Direct access denied");

class audioHandler 
{
	public static function upload($data) {
		extract($data, EXTR_PREFIX_ALL, "audio");
		
		$str = codeGen(25);

		// If folder is specified.
		if ($audio_folder) {
			if (is_dir($audio_folder) === FALSE) {
				mkdir($audio_folder, 0700);
			}
		}

		$return = array(
			"title" => array(),
			"name" => array(),
			"size" => array()
			);
		
		for ($i = 0; $i < count($audio_name); ++$i) {
			
			$authenticate = TRUE;
			$ext          = "";
			try {

				switch ($audio_type[$i]) {
					case 'audio/mpeg':  // other browsers
					case 'audio/mp3':	// For chrome browers				
						$ext = "mp3";						
						break;

					case 'audio/x-m4a':
						$ext = "m4a";
						break;
					
					default:
						throw new RuntimeException("<div>".$audio_name[$i]." is not an audio</div>", 1);
						$authenticate = FALSE;
						break;
				}


				if ($audio_error[$i] == TRUE) {
					throw new RuntimeException(uploadError::message($audio_error[$i]), 1);
				}
				if ($authenticate === TRUE) {
					$name = "$str$i".time().".$ext";
					$dir = "$audio_folder/$name";

					if (!move_uploaded_file($audio_tmp_name[$i], $dir)) {
						return FALSE;
					} else {
						array_push($return["name"], $name);
						array_push($return["size"], $audio_size[$i]);
						array_push($return["title"], $audio_name[$i]);
					}
				}

			} catch(RuntimeException $e) {
				die($e->getMessage());
			}
		} 

		return $return;
		
	}
}


?>