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
	order by	blog.postdate desc
	
	
	";

	$query = $GLOBALS['db']->query($sql);
	
	$nrcom = 0;
	
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
			News
		</div>
		
		<table class='list'>
			
			<tr>
				<th class='firstcell'>
					Header
				</th>
				<th>
					Poster
				</th>
				<th>
					Comments
				</th>
				<th>
					Date
				</th>
			</tr>
	";
	while ($blog_r = $query->fetch()) {
	
		$blog_date = date('Y-m-d - H:i', strtotime($blog_r['postdate']));
		/* comment count */
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
			<tr>
				<td class='firstcell'>
					<a href='?template=blog_edit&amp;blogid={$blog_r['id']}'>- {$blog_r['header']}</a>
				</td>
				<td>
					{$blog_r['fname']} {$blog_r['lname']}
				</td>
				<td>
					<a href='?template=blog_com_edit&amp;blogid={$blog_r['id']}'>$nrcom</a>
				</td>
				<td>
					{$blog_date}
				</td>
			";	
		echo "
				
			</tr>
		
		";
		$nrcom = 0;
	}
	echo "
				
		</table>
		
		";
