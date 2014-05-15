<?php
include("headers/buttons_admin.inc");

echo "
	<h3 class='header'>Charge import</h3>
	<form action='transaction/?template=import' method='post' enctype='multipart/form-data'>
		SVG Code:<br/>
		<input type='hidden' name='cval' value='$csum'/>
		<textarea rows='8' cols='75' name='charge'></textarea><br/>
		SVG File:<br/>
		<input type='file' name='file'/><br/><br/>
		<input type='submit' value='Next'/>
	</form>
	";

?>