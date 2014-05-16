<?php

	$blogid = $_GET['blogid'];
	
	$sql = "
	select		blog.id,
				blog.header,
				blog.content,
				blog.postdate,
				blog.poster,
				users.fname as fname,
				users.lname as lname
				
	from		blog LEFT JOIN users
	ON			blog.poster = users.id
	where		blog.id = ?
	
	
	";

	$query = $GLOBALS['db']->prepare($sql);
	$query->execute(array($blogid));
	
	$blog_r = $query->fetch();
	
	echo "
		<div class='header'>
			Edit News
		</div>
		
		{$blog_r['header']}
		
		<table>
			
			
	";
	
	echo "
				
		</table>
		
		";