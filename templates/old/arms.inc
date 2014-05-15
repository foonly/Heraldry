<?php

$query = "
	select	id,
				nam,
				gr,
				banner,
				definition
	from		$setting[schema].coatofarms
	where		id = $_GET[id]
	order by	nam
	";
$ca_r = pg_get($conn,$query);
$link = "?template=edit&amp;id=$ca_r[id]&amp;coa=".urlencode($ca_r[definition]);

include("headers/buttons.inc");

echo "
	<div class='armscontainer'>
		
		<h2 class='header'>$ca_r[nam]</h2>

		<div class='shieldshow'>
			<img src='$setting[rpath]/render.php?type=coa&amp;id=$_GET[id]&amp;size=414&amp;format=png'/>
		</div>

		<div class='blazon'>
			<h3>Blazon (beta)</h3>
			<p>".blazon(unserialize($ca_r[definition]))."</p>
		</div>
	
	</div>
	";


?>