<?php

	$charge_id = $_GET[chargeid];

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
		<div class='header'>
			{$charge_r['name']}
		</div>
		
		<table class='list'>
			<tr>
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
		";


		$chargev = $GLOBALS['db']->prepare($sql);
        $chargev->execute(array($charge_r['id']));
		while ($chargev_r = $chargev->fetch()) {
			echo "
					<tr>
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
						<td>
							{$chargev_r['lisense']}
						</td>
						<td>
							{$chargev_r['submitter']}
						</td>
					</tr>
				
			";	
		}
		
	echo "
		</table>
	";

