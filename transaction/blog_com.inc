<?php
$userid = $_POST['userid'];
$blogid = $_POST['blogid'];

$comment = $_POST['comment'];



if ($blogid > 0) {
	$sql = "
			insert into blog_comments (
			parent,
			content,
			postdate,
			poster
			) values (
			$blogid,
			'$comment',
			now(),
			'$userid'
			)
		";
	$query = $GLOBALS['db']->query($sql);
	

	$ret_url = 'index.php?template=main';
	
} else {

	
	
	
	$ret_url = 'index.php?template=main';
	
}

		header("Refresh: 0; URL=".$ret_url);
		
?>