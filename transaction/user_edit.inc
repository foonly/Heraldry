<?php
$userid = $_POST['userid'];
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$lvl = $_POST['lvl'];


if ($userid > 0) {
	$sql = "
			update users
			set		email='$email',
					fname='$fname',
					lname='$lname',
					lvl=$lvl
					
			where	id='$userid'
		";
	$query = $GLOBALS['db']->query($sql);
	

	$ret_url = 'admin.php?template=user_list';
	
} else {

	
	$sql = "
			insert into users (
			email,
			fname,
			lname,
			created,
			lvl
			) values (
			'$email',
			'$fname',
			'$lname',
			now(),
			$lvl
			)
		";
	$query = $GLOBALS['db']->query($sql);
	
	$ret_url = 'admin.php?template=user_list';
	
}

		header("Refresh: 1; URL=".$ret_url);
		
?>