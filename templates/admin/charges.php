<?php
	$sql = "
	select		id,
				name,
				so,
				cover
	from		charge_group
	
	
	";

	$query = $GLOBALS['db']->query($sql);
	
	
	echo "
		<div class='header'>
			Charges
		</div>
		
		
	";
	while ($c_group_r = $query->fetch()) {
	
		echo "
				<b>{$c_group_r['name']}</b><br/>
			";	
		/*fetch charge names from selected group */
		$sql = "
		select		id,
					name,
					charge_group,
					license
		from		charge_name
		where		charge_group = ?
		";


		$charge = $GLOBALS['db']->prepare($sql);
        $charge->execute(array($c_group_r['id']));
		while ($charge_r = $charge->fetch()) {
			echo "
				{$charge_r['name']}<br/>
			";	
		}
		echo "
			<br/>
			
		";
	}
