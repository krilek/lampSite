<?php
	//
	function clearSpecChars($text, $pattern = "/[\"'\\/{};?\[\]><=;|)(]/"){
		$output = preg_replace($pattern, "", $text);
		return $output;
	}
?>