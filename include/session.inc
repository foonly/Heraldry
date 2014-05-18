<?php
/* user id */

if ($_SESSION['s_id']) {
	$s_id = $_SESSION['s_id'];
	
} else {
	
}


/* query user info */
/*
$sql = "
	select		id,
				login,
				pass,
				lvl,
				fname,
				lname
	from		users
	where		id = $s_id
";

$userlog = $GLOBALS['db']->query($sql);

*/
?>