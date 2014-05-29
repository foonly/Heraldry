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
		<div class='action_bar'>
			<div class='path'>
				<a href='?template=main'>
					<div class='pathitem'>
						News
					</div>
				</a>
				
			</div>
			<div class='actions'>
				<a href='?template=blog_edit&amp;blogid=0'>
					<div>
						Add News
					</div>
				</a>
			</div>
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
					<a href='?template=blog_view&amp;blogid={$blog_r['id']}'>
						<span>{$blog_r['header']} by {$blog_r['fname']} {$blog_r['lname']}</span>
					</a>
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

