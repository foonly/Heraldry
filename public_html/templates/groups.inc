<?php

if ($lvl < 4) {
	echo "Permission Denied";
	return;
}

$query = "
	select	id,
				name,
				main,
				sub,
				so
	from		$setting[schema].groups
	order by	main, so
	";
$gr = pg_query($conn,$query);

include("headers/buttons_admin.inc");

echo "
<h3 class='header'>Groups</h3>
	<form action='transaction/?template=groups_save' method='post'>
		Sort order: Main Group: Group:<br/>
	";

while ($gr_r = pg_fetch_array($gr)) {
	if ($gr_r[so] > $so)
		$so = $gr_r[so];
	echo "
		<input type='hidden' name='ids[]' value='$gr_r[id]'/>
		<input type='text' class='short' name='$gr_r[id][so]' size='2' value='$gr_r[so]'/>
		<input type='text' class='short' name='$gr_r[id][main]' value='$gr_r[main]'/>
		<input type='text' name='$gr_r[id][sub]' value='$gr_r[sub]'/>
		<br/>
		";
}
$so += 2;
echo "
		<input type='hidden' name='ids[]' value='0'/>
		<input type='text' class='short' name='0[so]' size='2' value='$so'/>
		<input type='text' class='short' name='0[main]' value=''/>
		<input type='text' name='0[sub]' value=''/>
		<br/>
		<input type='submit' name='save' value='Save'/>
		<input type='submit' name='save_exit' value='Save &amp; Exit'/>
		<input type='hidden' name='cval' value='$csum'/>
	</form>
	";

?>