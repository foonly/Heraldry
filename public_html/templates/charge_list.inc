<?php

if ($lvl < 4) {
	echo "Permission Denied";
	return;
}
$charge_group = " ";
$query = "
	select	id,
				name,
				variation,
				charge_group
	from		$setting[schema].charges
	where		charge_group = $_GET[cgroup]
	order by name, variation
	";
$ch = pg_query($conn,$query);

include("headers/buttons_admin.inc");

echo "

	<h3 class='header'>$_GET[cgroup] Charges</h3>

	
	";
while ($ch_r = pg_fetch_array($ch)) {
	echo "
		<a href='?template=charge&amp;id=$ch_r[id]'>
		<div class='charge_list'>
			<img src='$setting[rpath]/render.php?type=charge&amp;size=50&amp;id=$ch_r[id]&amp;format=png' alt=''/>
			".ucwords($ch_r[name])."<br/>
			".ucwords($ch_r[variation])."
		</div>
		</a>
		";
}

?>