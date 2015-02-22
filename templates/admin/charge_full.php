<?php

	$charge_id = empty($_GET['chargeid'])?0:$_GET['chargeid'];

	/*fetch charge names from selected group */
		$sql = "
		select		charge_name.id,
					charge_name.name as name,
					charge_name.charge_group,
					charge_name.license,
					charge_group.name as gname
		from		charge_name LEFT JOIN charge_group
		ON			charge_name.charge_group = charge_group.id
		order by	charge_group.name, charge_name.name
		
		";


		$charge = $GLOBALS['db']->prepare($sql);
        $charge->execute(array());
	
	echo "
		<div class='action_bar'>
			<div class='path'>
				<a href='?template=charges'>
					<div class='pathitem'>
						Charges
					</div>
				</a>
				<a href='?template=charge_full'>
					<div class='pathitem'>
						Charge full list
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
	
	
		while ($charge_r = $charge->fetch()) {
			
		
	echo "
		<div class='header'>
			{$charge_r['gname']} - {$charge_r['name']}
		</div>
		";
		
	echo "
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
				
				//<img src='render.php?type=charge&amp;size=50&amp;id={$chargev_r['id']}&amp;format=png' alt='bild'/>
				//".renderCharge($chargev_r['id'])."
				
				
				
			echo "
					<tr>
						<td>
							
							<img src='render/charge.png?id={$chargev_r['id']}&amp;size=50&amp;format=png' alt='bild'/>
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
	}
	