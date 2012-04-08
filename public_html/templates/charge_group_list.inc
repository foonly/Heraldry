<?php

if ($lvl < 4) {
	echo "Permission Denied";
	return;
}

$query = "
	select	id,
				name,
				so,
				cover
	from		$setting[schema].charge_group
	order by so
	";
$ch = pg_query($conn,$query);

include("headers/buttons_admin.inc");

echo "

	<h3 class='header'>Charge Groups</h3>

	
	";
while ($ch_r = pg_fetch_array($ch)) {
	echo "
		<a href='?template=charge_list&amp;cgroup=$ch_r[id]'>
		<div class='charge_group_list'>
			<img src='$setting[rpath]/render.php?type=charge&amp;size=50&amp;id=$ch_r[cover]&amp;format=png' alt=''/>
			".ucwords($ch_r[id])." 
			".ucwords($ch_r[name])."<br/>
			SO: ".ucwords($ch_r[so])."
		</div>
		</a>
		";
}

?>