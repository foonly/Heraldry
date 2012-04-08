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
	order by postdate
	";
$bl = pg_query($conn,$query);

include("headers/buttons_admin.inc");

echo "

	<h3 class='header'>Blog Posts</h3>

	<ul class='biglist'>
		<li><a href='?template=blog_edit'>New Blog Entry</a></li>
		<br/>
	";
while ($bl_r = pg_fetch_array($bl)) {
	echo "
			<li><a href='?template=blog_edit&amp;id=$bl_r[id]'>$bl_r[header]</a></li>
			
		
		";
}
echo "

	</ul>
	";

?>