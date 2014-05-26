<?php

	$group_id = $_GET[groupid];

	$sql = "
	select		id,
				name,
				so,
				cover
	from		charge_group
	where		id = ?
	
	";

	$group = $GLOBALS['db']->prepare($sql);
	$group->execute(array($group_id));
	
	$c_group_r = $group->fetch();
	echo "
		<div class='header'>
			{$c_group_r['name']}
		</div>
		
		
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
					<a href='admin.php?template=charge_var&amp;chargeid={$charge_r['id']}'>
						<div class='itemcont contsmall'>
							<div class='boxheader'>{$charge_r['name']}</div>
						</div>
					</a>
			";	
		}
		
	

