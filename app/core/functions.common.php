<?php

function pn_str2slug($string) {

	if (preg_match("/[^-\._a-z\d]/iu", $string)) {
		$string = pn_str2translit($string);
		
		$string = preg_replace("/[^-\._a-z\d\s]/iu", "", $string);
		$string = trim($string);
		
		$search = array("/[.\s]/");
		$replace = array("-");
		
		$string = preg_replace($search, $replace, $string);
		$string = preg_replace("/[-]+/", "-", $string);
	}
	
	return mb_strtolower($string, "UTF-8");

}

function pn_str2translit($string) {
	
	if (preg_match("/[ёЁа-яА-Я]/iu", $string)) {
		$string = trim($string);

		$search = array("/а/iu","/б/iu","/в/iu","/г/iu","/д/iu","/е/iu","/ё/iu","/ж/iu","/з/iu","/и/iu","/й/iu","/к/iu","/л/iu","/м/iu","/н/iu","/о/iu","/п/iu","/р/iu","/с/iu","/т/iu","/у/iu","/ф/iu","/х/iu","/ц/iu","/ч/iu","/ш/iu","/щ/iu","/ь/iu","/ы/iu","/ъ/iu","/э/iu","/ю/iu","/я/iu");
		$replace = array("a","b","v","g","d","e","yo","zh","z","i","j","k","l","m","n","o","p","r","s","t","u","f","h","ts","ch","sh","sch","","y","","e","u","ya");
		
		$string = preg_replace($search, $replace, $string);
	}
	
	return $string;
	
}

function pn_hash($string = "") {

	return md5($string);

}

function pn_file_copy($file, $dir, $filename = false) {
	
	$errors = array();
	
	if (!$filename) {
		$filename = basename($file);
	}
	
	$filename = pn_str2translit($filename);
	
	if (!preg_match("/\/$/", $dir)) {
		$dir = $dir . "/";
	}
	
	if (!is_file($file)) {
		if (!preg_match("/^http/", $file)) {
			$errors[] = "Исходный файл не найден";
		}
	}
	if (!is_dir($dir)) {
		$errors[] = "Целевая директория не найдена";
	}
	
	if (!empty($errors)) {
		foreach ($errors as $_error) {
			pn_global_error($_error);
		}
		return false;
	}
	
	if (!function_exists("_pn_file_copy_filename")) {
		
		function _pn_file_copy_filename($dir, $filename, $i = 0) {
			
			if ($i) {
				$filename = preg_replace("/(--[\d]+|)(\.[a-z\d]{2,4})$/iu", "--" . $i . "\\2", $filename);
			}
			
			if (is_file($dir . $filename)) {
				$i++;
				return _pn_file_copy_filename($dir, $filename, $i);
			}
			
			return $filename;
			
		}
		
	}
	
	$filename = _pn_file_copy_filename($dir, $filename);
	
	if (!@copy($file, $dir . $filename)) {
		return false;
	}
	
	@chmod($dir . $filename, 0666);
	
	return $filename;
	
}

function pn_global_error($error) {

	global $pn_global_errors;

	if (!isset($pn_global_errors)) {
		$pn_global_errors = array();
	}
	
	$pn_global_errors[] = $error;
	
	return true;

}

function pn_global_errors() {
	
	global $pn_global_errors;
	
	if (!isset($pn_global_errors)) {
		$pn_global_errors = array();
	}
	
	return (!empty($pn_global_errors)) ? $pn_global_errors : false;
	
}