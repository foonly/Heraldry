<?php
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
	order by	postdate desc
	
	
	";

	$query = $GLOBALS['db']->query($sql);
	
	$nrcom = 0; 
	echo "
		<div class='header'>
			News
		</div>
		
		
	";
	while ($blog_r = $query->fetch()) {
	
		
		/* */
		$sql = "
		select		id,
					parent,
					content,
					poster,
					postdate
		from		blog_comments
		where		parent = ?
		";


		$comment = $GLOBALS['db']->prepare($sql);
        $comment->execute(array($blog_r['id']));
		
		while ($comment_r = $comment->fetch()) {
			$nrcom += 1; 
			
		}
		
		$blog_date = date('Y-m-d - H:m', strtotime($blog_r['postdate']));
		
		echo "
			<div class='blogpost'>
				<div class='blogheader'>
					<span>{$blog_r['header']} by {$blog_r['fname']} {$blog_r['lname']}</span>
					<div class='bloginfo right'>
						Comments: $nrcom - 
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
		$nrcom = 0; 
	}

