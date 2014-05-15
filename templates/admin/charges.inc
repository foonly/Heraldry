<?php
	$query = "
	select		id,
				name,
				so,
				cover
	from		charge_group
	
	
	";

	$c_group = pg_query($conn, $query);
	
	
	echo "
		<div class='header'>
			Charges
		</div>
		
		
	";
	while ($c_group_r = pg_fetch_array($c_group)) {
	
		echo "
				<b>$c_group_r[name]</b><br/>
			";	
		/*fetch charge names from selected group */
		$query = "
		select		id,
					name,
					charge_group,
					license
		from		charge_name
		where		charge_group = $c_group_r[id]
		
		
		";
	
		$charge = pg_query($conn, $query);
		while ($charge_r = pg_fetch_array($charge)) {
			echo "
				$charge_r[name]<br/>
			";	
		}
		echo "
			<br/>
			
		";
	}
?>