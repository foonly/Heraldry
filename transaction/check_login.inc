<?php

require '../include/PasswordHash.inc';

// Base-2 logarithm of the iteration count used for password stretching
$hash_cost_log2 = 8;
// Do we require the hashes to be portable to older systems (less secure)?
$hash_portable = FALSE;

$user = $_POST['user'];
$pass = $_POST['pass'];

$hash = '*'; // In case the user is not found

$hasher = new PasswordHash($hash_cost_log2, $hash_portable);

$_SESSION['s_id']=0;

$sql = "
	select		id,
				login,
				pass
	from		users
	where		login = ?
";

$query = $GLOBALS['db']->prepare($sql);
$query->execute(array($user));
$user_r = $query->fetch();

$hash = $user_r['pass'];

if ($hasher->CheckPassword($pass, $hash)) {
		$message = 'Authentication succeeded '.$user_r[id];
		$ret_url = 'index.php?template=main';
		$_SESSION['s_id'] = $user_r['id'];
		$icon = 'img/icon_succ.png';
} else {
		$message = 'Authentication failed';
		$ret_url = 'index.php?template=login';
		$icon = 'img/icon_fail.png';
}
unset($hasher);


header("Refresh: 2; URL=".$ret_url);

echo "
	<div class='messagebox'>
		<img class='messageicon' src='$icon' alt='$message'/>
		<p class='messagetext'>$message</p>
	</div>
	";

?>