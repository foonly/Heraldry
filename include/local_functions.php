<?php

function var_glob ($path) {
	$temp = glob($path);
	foreach ($temp as $k => $obj) {
		$t = explode("/",$obj);
		$t = substr($t[count($t)-1],4,-4);		
		$temp[$k] = $t;
	}
	return $temp;
}

function invertHex ($hex) {
	if (strlen($hex) == 7 && substr($hex,0,1) == "#") {
		$he = "#";
		for ($i = 1;$i<6;$i+=2) {
			$he .= str_pad(dechex(255 - hexdec(substr($hex,$i,2))),2,"0",STR_PAD_LEFT);
		}
	} else {
		$he = "#333333";
	}	
	
	return $he;
}

function classloader ($class) {
    include_once "../classes/{$class}.class.inc";
}
