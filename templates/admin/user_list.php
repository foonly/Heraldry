<?php
	$sql = "
	select		id,
				email,
				fname,
				lname,
				created,
				refresh,
				lvl
				
	from		users
	
	
	";

	$query = $GLOBALS['db']->query($sql);
	
	
	
	echo "
		<div class='action_bar'>
			<div class='path'>
				<a href='?template=blog_list'>
					<div class='pathitem'>
						Users
					</div>
				</a>
			</div>
			<div class='actions'>
				<a href='?template=user_edit&amp;userid=0'>
					<div>
						Add User
					</div>
				</a>
			</div>
		</div>
	";
	
	echo "
		
		
		<table class='list'>
			
			<tr>
				<th class='firstcell'>
					email
				</th>
				<th>
					Name
				</th>
				<th>
					Created
				</th>
				<th>
					Lvl
				</th>
			</tr>
	";
	while ($user_r = $query->fetch()) {
	
		$date = date('Y-m-d - H:i', strtotime($user_r['created']));
		
		echo "
			<tr>
				<td class='firstcell'>
					<a href='?template=user_edit&amp;userid={$user_r['id']}'>- {$user_r['email']}</a>
				</td>
				<td>
					{$user_r['fname']} {$user_r['lname']}
				</td>
				<td>
					{$date}
				</td>
				<td>
					{$user_r['lvl']}
				</td>
			";	
		echo "
				
			</tr>
		
		";
		
	}
	echo "
				
		</table>
		
		";