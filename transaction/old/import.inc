<?php

if (strlen($charge)) {
	$text = stripslashes($charge);
}
foreach ($_FILES as $f) {
	if (is_uploaded_file($f[tmp_name])) {
		$name = $f[name];
		$text = "";
		if ($handle = fopen($f[tmp_name],"r")) {
	 		while (!feof($handle)) {
				$text .= fgets($handle, 4096);
			}
			fclose($handle);		
		}
		
	}
}
if (strlen($text)) {
	preg_match("/<svg[^>]*>[^$]*<\/svg>/i",$text,$matches);	
	$svg = $matches[0];
	preg_match("/<svg[^>]*height=[\"']([0-9]*)[^>]*>/i",$svg,$matches);
	$height = $matches[1];	
	preg_match("/<svg[^>]*width=[\"']([0-9]*)[^>]*>/i",$svg,$matches);
	$width = $matches[1];	

	$na = explode("_",strtolower($name),2);
	$query = "
		insert into	$setting[schema].charges (
			name,
			variation,
			height,
			width,
			body
		) values (
			'".addslashes($na[0])."',
			'".addslashes($na[1])."',
			$height,
			$width,
			'".addslashes($svg)."'
		)";
	pg_query($conn,$query);
	$id = pg_get_maxid($conn,"$setting[schema].charges");
	$returl = "?template=charge&id=$id";
} else {
	$returl = "?template=import";
}


?>