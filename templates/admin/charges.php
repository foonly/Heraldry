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
		<div class='action_bar'>
			<div class='path'>
				<a href='?template=charges'>
					<div class='pathitem'>
						Charges
					</div>
				</a>
				
			</div>
			<div class='actions'>
				<a href='?template=charge_full'>
					<div>
						Show full list
					</div>
				</a>
				<div>
					Do stuff 2
				</div>
			</div>
		</div>
	";
	
	while ($c_group_r = $query->fetch()) {
	
		
		$charge_nr = 0;
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
			$charge_nr += 1;
		}
		
		echo "
				<a href='admin.php?template=charge_list&amp;groupid={$c_group_r['id']}'>
						<div class='itemcont contbig'>
							<div class='boxheader'>{$c_group_r['name']}</div>
							<img src='/render/50/charge{$c_group_r['cover']}.png' alt='bild'/>
							$charge_nr
						</div>
				</a>
				
			";	
		
		
		
		echo "
			
			
		";
	}

