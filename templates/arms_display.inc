<?php

if ($_GET[group])
	$asql = "and	id = $_GET[group]";

$query = "
	select	id,
				main,
				sub
	from		$setting[schema].groups
	where		main = '$_GET[main]'
	$asql
	order by	main, so, sub
	";
$gr = pg_query($conn,$query);

include("headers/buttons.inc");

echo "
	<div class='armscontainer'>
		<h2 class='header'><a href='?template=arms_list&amp;main=$_GET[main]'>Coat Of Arms - $_GET[main]</a></h2>
	";
while ($gr_r = pg_fetch_array($gr)) {
	echo "
		<div class='catcont'>
			<div class='cat'>
					$gr_r[sub]
			</div>
			";
		$query = "
			select	id,
						nam
			from		$setting[schema].coatofarms
			where		gr = $gr_r[id]
			and		approved = true
			and		private = false
			order by	nam
			";
		$ca = pg_query($conn,$query);
		while ($ca_r = pg_fetch_array($ca)) {
			echo "
				<div class='arms'>
					<a href='?template=arms&amp;id=$ca_r[id]&amp;main=$_GET[main]&amp;group=$_GET[group]'>
						<div>$ca_r[nam]</div>
						<img src='$setting[rpath]/render.php?type=coa&amp;size=120&amp;id=$ca_r[id]&amp;format=png'/>
					</a>
				</div>
				";
		}
		echo "
			<br class='clear'/>
			</div>
			";
}

echo "		
	</div>
	";

?>