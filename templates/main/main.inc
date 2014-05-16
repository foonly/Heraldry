<?php
	$sql = "
	select		id,
				header,
				content,
				postdate,
				poster
	from		blog
	order by	postdate
	
	
	";

	$query = $GLOBALS['db']->query($sql);
	
	
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
		echo "
			<div class='blogpost'>
				<div class='blogheader'>
					<span>{$blog_r['header']} by {$blog_r['poster']}</span>
					<div class='bloginfo right'>
						Comments: $nrcom - 
						{$blog_r['postdate']}
					</div>
				</div>
			";	
		echo "
				<div class='blogtext'>
					{$blog_r['content']}
				</div>
			</div>
		";
	}

