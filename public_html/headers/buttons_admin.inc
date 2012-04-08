<?php

echo "
	<div class='buttonrow'>
		<a href='?template=admin'>
			<div class='button'>
				Admin
			</div>
		</a>
		
		
		";
	
	/* Admin */
	if	($_GET[template] == 'charge_list') {
		echo "
		<a href='?template=charge_group_list'>
			<div class='button'>
				Back to list
			</div>
		</a>
		<a href='?template=import'>
			<div class='button'>
				New Charge
			</div>
		</a>
		
		";
	}
	
	echo "
	</div>
	";
?>