<?php
$userid = $_POST['userid'];
$blogid = $_POST['blogid'];
$header = $_POST['header'];
$content = $_POST['content'];



if ($blogid > 0) {
	$sql = "
			update blog
			set		header='$header',
					content='$content'
					
			where	id=$blogid
		";
	$query = $GLOBALS['db']->query($sql);
	

	$ret_url = 'admin.php?template=blog_list';
	
} else {

	
	$sql = "
			insert into blog (
			header,
			content,
			postdate,
			poster
			) values (
			'$header',
			'$content',
			now(),
			'$userid'
			)
		";
	$query = $GLOBALS['db']->query($sql);
	
	$ret_url = 'admin.php?template=blog_list';
	
}

		header("Refresh: 1; URL=".$ret_url);
		
?>