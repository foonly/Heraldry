<?php
	
	if (!$_GET['blogid']) {
		$blogid = 0;
	} else {
		$blogid = $_GET['blogid'];
	}
	
	
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
	
	$blog_date = date('Y-m-d - H:m', strtotime($blog_r['postdate']));
	
	echo "
		<div class='header'>
			{$blog_r['header']}
		</div>
		
		
			<div class='blogpost'>
				<div class='blogheader'>
					
						<span>{$blog_r['header']} by {$blog_r['fname']} {$blog_r['lname']}</span>
				
					<div class='bloginfo right'>
						
						{$blog_date}
					</div>
				</div>
			";	
		echo "
				<div class='blogtext'>
					{$blog_r['content']}
				</div>
			</div>
		";
		
		
	/* comments */
		$sql = "
		select		blog_comments.id,
					blog_comments.parent,
					blog_comments.content,
					blog_comments.poster,
					blog_comments.postdate,
					users.fname as fname,
					users.lname as lname
		from		blog_comments LEFT JOIN users
		ON			blog_comments.poster = users.id
		where		parent = ?
		";


		$comment = $GLOBALS['db']->prepare($sql);
        $comment->execute(array($blog_r['id']));
		
		/* loop comments */
		while ($comment_r = $comment->fetch()) {
			$nrcom += 1; 
			
		
		
		$blog_date = date('Y-m-d - H:m', strtotime($comment_r['postdate']));
		
		echo "
			<div class='blogcomment'>
				<div class='commentheader'>
					
						<span>Comment by {$comment_r['fname']} {$comment_r['lname']}</span>
					
					<div class='bloginfo right'>
						{$blog_date}
					</div>
				</div>
			";	
		echo "
				<div class='blogtext'>
					{$comment_r['content']}
				</div>
			</div>
		";
		
		}
		$nrcom = 0; 