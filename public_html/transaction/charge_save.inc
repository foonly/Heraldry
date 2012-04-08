<?php

if (!$_GET[id] || isset($_GET[savecopy])) {
	$query = "
		insert into	$setting[schema].coatofarms (
			nam,
			gr,
			banner,
			definition,
			creator
		) values (
			'$_GET[name]',
			'$_GET[gr]',
			'$_GET[banner]',
			'".serialize($coa)."',
			$_SESSION[id]
		)";
	pg_query($conn,$query);
	$_GET[id] = db_max($conn,"$setting[schema].coatofarms");
} else {
	$query = "
		update	$setting[schema].coatofarms
		set		nam = '$_GET[name]',
					gr = '$_GET[gr]',
					banner = '$_GET[banner]',
					definition = '".serialize($coa)."'
		where		id = $_GET[id]
		";
	pg_query($conn,$query);
}

?>