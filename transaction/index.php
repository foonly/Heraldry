<?php

require("../../globals/init.php");
require("../../globals/init_heraldry.inc");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($_GET[template] != "main" && md5($_COOKIE["check"]) == $_POST[cval]) {
		require("$_GET[template].inc");
		header("Location: http://".$_SERVER["HTTP_HOST"].$setting[rpath]."/$returl");
	} else {
		echo "Checksum error";
	}
} else {
	echo "Method error, use POST";
}

?>