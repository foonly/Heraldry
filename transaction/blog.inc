<?php

$returl = "?template=blog_list";

if (!$_POST[id]) {
	$query = "
		insert into	$setting[schema].blog (
			header,
			content
			
		) values (
			'$_POST[header]',
			'$_POST[content]'
		)";
	pg_query($conn,$query);
	$_POST[id] = db_max($conn,"$setting[schema].blog");
} else {
	$query = "
		update	$setting[schema].blog
		set		header = '$_POST[header]',
					content = '$_POST[content]'
		where		id = $_POST[id]
		";
	pg_query($conn,$query);
}
?>