<?php
	
	if (!$_GET['userid']) {
		$userid = 0;
	} else {
		$userid = $_GET['userid'];
	}
	
	
	$sql = "
	select		id,
				email,
				fname,
				lname,
				created,
				refresh,
				lvl
				
	from		users
	where		id = ?
	
	
	";

	$query = $GLOBALS['db']->prepare($sql);
	$query->execute(array($userid));
	
	$user_r = $query->fetch();
	
	echo "
		<div class='action_bar'>
			<div class='path'>
				<a href='?template=user_list'>
					<div class='pathitem'>
						Users
					</div>
				</a>
				<a href='?template=user_edit&amp;userid=$userid'>
					<div class='pathitem'>
						User Edit
					</div>
				</a>
			</div>
			<div class='actions'>
				
			</div>
		</div>
		
		<form action='transaction.php?t=user_edit' method='post' id='usersave'>
		<input type='hidden' name='userid' value='{$userid}'/>
		
			<table>
				<tr>
					<th style='text-align: left;'>
						Email:
					</th>
					<td>
						<input type='text' name='email' value='{$user_r['email']}'/>
					</td>
				</tr>
				<tr>
					<th style='text-align: left;'>
						First:
					</th>
					<td>
						<input type='text' name='fname' value='{$user_r['fname']}'/>
					</td>
				</tr>
				<tr>
					<th style='text-align: left;'>
						Last:
					</th>
					<td>
						<input type='text' name='lname' value='{$user_r['lname']}'/>
					</td>
				</tr>
				<tr>
					<th style='text-align: left;'>
						Level:
					</th>
					<td>
						<input type='text' name='lvl' value='{$user_r['lvl']}'/>
					</td>
				</tr>
				<tr>
					
					<td colspan='2'>
						<input type='submit' value='Save'/>
					</td>
				</tr>
				
	";
		
	echo "
					
			</table>
		</form>
		";