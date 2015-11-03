<?php
	/*fetch charge group */
	$group_id = $_GET['groupid'];

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
	

	$charge_id = $_GET['chargeid'];

	/*fetch charge names from selected group */
		$sql = "
		select		id,
					name,
					charge_group,
					license
		from		charge_name
		where		id = ?
		";


		$charge = $GLOBALS['db']->prepare($sql);
        $charge->execute(array($charge_id));
	
		$charge_r = $charge->fetch();
		
		echo "
		<div class='action_bar'>
			<div class='path'>
				<a href='?template=charges'>
					<div class='pathitem'>
						Charges
					</div>
				</a>
				<a href='?template=charge_list&amp;groupid=$group_id'>
					<div class='pathitem'>
						{$c_group_r['name']}
					</div>
				</a>
				
				
			</div>
			<div class='actions'>
				<a href='?template=blog_edit&amp;blogid=0'>
					<div>
						Add News
					</div>
				</a>
			</div>
		</div>	
	";
		
	echo "
		<div class='header'>
			{$charge_r['name']}
		</div>
		
		<table class='list'>
			<tr>
						<th>
						</th>
						<th>
							Variation
						</th>
						<th>
							H:
						</th>
						<th>
							W:
						</th>
						<th>
							Proper:
						</th>
						<th>
							Details:
						</th>
						<th>
							Lisense:
						</th>
						<th>
							Submitter:
						</th>
			</tr>
	";
	
	
			
		/*fetch charge names from selected group */
		$sql = "
		select		id,
					charge_name,
					variation,
					height,
					width,
					body,
					proper,
					details,
					license,
					submitter
		from		charge_var
		where		charge_name = ?
		order by	variation
		";


		$chargev = $GLOBALS['db']->prepare($sql);
        $chargev->execute(array($charge_r['id']));
		while ($chargev_r = $chargev->fetch()) {
			/*fetch charge licenses */
				$sql = "
				select		name,
							type,
							type_nr,
							ident
				from		license
				where		ident = ?
				";
		
		
				$license = $GLOBALS['db']->prepare($sql);
		        $license->execute(array($chargev_r['license']));
		        $license_r = $license->fetch();
		        
		        if ($license_r['type_nr'] == 1) {
		        	$col = 'green';
		        } elseif ($license_r['type_nr'] == 2) {
		        	$col = 'red';
		        } else {
		        	$col = '#f0f0f0';
		        }
		        
		        /*fetch user */
				$sql = "
				select		id,
							fname,
							lname
				from		users
				where		id = ?
				";
		
		
				$subuser = $GLOBALS['db']->prepare($sql);
		        $subuser->execute(array($chargev_r['submitter']));
		        $subuser_r = $subuser->fetch();
		        
			echo "
					<tr>
						<td>
							<img src='/render/50/charge{$chargev_r['id']}.png' alt='bild'/>
						</td>
						<td>
							{$chargev_r['variation']}
						</td>
						<td>
							{$chargev_r['height']}
						</td>
						<td>
							{$chargev_r['width']}
						</td>
						<td>
							{$chargev_r['proper']}
						</td>
						<td>
							{$chargev_r['details']}
						</td>
						<td style='color: $col'>
							{$license_r['name']}
						</td>
						<td>
							{$subuser_r['fname']}
						</td>
					</tr>
				
			";	
		}
		
	echo "
		</table>
	";

