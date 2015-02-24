<?php
	$blog_id = $_GET[blogid];

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
        $comment->execute(array($blog_id));
	
	echo "
		<div class='action_bar'>
			<div class='path'>
				<a href='?template=blog_list'>
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
	
	echo "
		<div class='header'>
			$blog_id
		</div>
		
		
	";
	while ($comment_r = $comment->fetch()) {
	
		$blog_date = date('Y-m-d - H:i', strtotime($comment_r['postdate']));
		
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
		$nrcom = 0;
	}
	echo "
				
		
		
		";