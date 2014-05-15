<?php

if ($lvl < 4) {
	echo "Permission Denied";
	return;
}

$query = "
	select	id,
				header,
				content,
				postdate
	from		$setting[schema].blog
	where 		id = $_GET[id]
	";
$bl_r = pg_get($conn,$query);

include("headers/buttons_admin.inc");

echo "

	<h3 class='header'>Blog Post$bl_r[id]</h3>
	<form action='transaction/?template=blog' method='post'>
		<input type='hidden' name='cval' value='$csum'/>
		<input type='hidden' name='id' value='$bl_r[id]'/>
		<label for='header'>Header:</label><input type='text' name='header' value='$bl_r[header]'/><br/>
		<label for='content'>Content:</label><br/>
		<textarea id='content' name='content' cols='40' rows='15' style='width: 100%;'>".htmlentities($bl_r[content],ENT_NOQUOTES,"UTF-8")."</textarea><br/>
		
		<input type='submit' value='Save'/>
	</form>
	";

?>