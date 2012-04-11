<?php

require("../globals/init.inc");
require("../globals/init_heraldry.inc");

# if the format's not set, or is wrong, set it to svg
if( $_GET[format] == "png" || $_GET[format] == "svg" || $_GET[format] == "pdf" )
	{
	$output_format = $_GET[format];
	}
else
	{
	$output_format = "svg";
	}


$svg = '<?xml version="1.0" encoding="UTF-8"?>\n';
$hash = md5($_SERVER["QUERY_STRING"]);

$size = isset( $_GET[size] ) ? $_GET[size] : 100;
$filename = $itemtype;

switch ($_GET[type]) {
	case "charge":
		
		$svg .= renderCharge($_GET[id]);
		$f = strpos($svg, "100%");
		$svg = substr_replace($svg, $size."px", $f, 4);
		$f = strpos($svg, "100%");
		$svg = substr_replace($svg, $size."px", $f, 4);
	break;
	case "shield":
		if (isset($_GET[ord])) {
			if (is_array($_GET[ord])) {
				$ord = $_GET[ord];
			} else {
				foreach (explode(" ",$_GET[ord]) as $k => $v) {			
					$oo = explode("_",$v);
					$ord[$k] = Array("tp" => $oo[0],"col" => $oo[1]);
				}
			}
		} 
		$svg .= renderShield ($_GET[fld],$_GET[div],"",$_GET[dcl1],$_GET[dcl2],$ord);
		$f = strpos($svg, "100%");
		$svg = substr_replace($svg, $size."px", $f, 4);
		$f = strpos($svg, "100%");
		$svg = substr_replace($svg, $size."px", $f, 4);
	break;
	case "coa":
		if (isset($_GET[coa])) {
			$coa = unserialize($_GET[coa]);
		} else {		
			$coa = coatofarms($_GET[id]);
		}
		$svg .= renderSVG($coa);
		if( $coa[name] ) {
			$filename = $coa[name];
			}
	break;
	default:
		exit();
	break;
}

// start to output the file

$filename = preg_replace("/[^a-zA-Z0-9]/", "_", $filename). ".{$output_format}";
$extopt = "";
switch ($output_format) {
	case "svg":
		header("Content-type: image/svg+xml; charset=utf-8"); 
		header("Content-Disposition: inline; filename={$filename}");
		echo $svg;
	break;
	case "png":
		if (!$fmt) $fmt = "image/png";
		$extopt = " -a -h {$size}";
		}
		// Passtrough
	case "pdf":
		if (!$fmt) $fmt = "application/pdf";
		$file = tempnam($setting[tmppath],"heraldry_").".svg";
		if ($handle = fopen($file, "w")) {
			fwrite($handle,$svg);
			fclose($handle);
			header("Content-type: ".$fmt); 
			header("Cache-control: public");
			header("Pragma: public");
			header("Expires: ".date("D, d M Y H:i:s T",time()+86400));
			header("Content-Disposition: inline; filename={$filename}");
			// convert the file from svg
			passthru("rsvg-convert {$extopt} --format={$output_format} {$file}");
			unlink( $file );
			unset($file);
		}
	break;
}

?>
