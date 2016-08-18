<?php

$returl = "?template=groups";

foreach ($_POST[ids] as $i) {
	$p = $_POST[$i];
	if ($i || strlen(trim($p[main])))
		db_update ($conn,$p,"$setting[schema].groups",$i,"main,sub,so");
}
$query = "
	select	id,
				main
	from		$setting[schema].groups
	order by	main,so
	";
$gr = pg_query($conn,$query);

while ($gr_r = pg_fetch_array($gr)) {
	if ($gr_r[main] != $tgr) {
		$tgr = $gr_r[main];
		$so = 0;	
	}
	$so += 2;
	$query = "
	update		$setting[schema].groups
	set			so = $so
	where			id = $gr_r[id]
	";
	pg_query($conn,$query);
}

if (isset($_POST[save_exit]))
	$returl = "?template=admin";


?>