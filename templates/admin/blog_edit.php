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
	
	echo "
		<div class='action_bar'>
			<div class='path'>
				<a href='?template=blog_edit&amp;blogid=$blogid'>
					<div class='pathitem'>
						News Edit
					</div>
				</a>
			</div>
			<div class='actions'>
				
			</div>
		</div>
		
		<form action='transaction.php?t=blog_edit' method='post' id='blogsave'>
		<input type='hidden' name='userid' value=''/>
		<input type='hidden' name='blogid' value='$blogid'/>
			<table>
				<tr>
					<th style='text-align: left;'>
						Header:
					</th>
					<td>
						<input type='text' name='header' value='{$blog_r['header']}'/>
					</td>
				</tr>
				<tr>
					<th colspan='2' style='text-align: left;'>
						Content:
					</th>
					
				</tr>
				<tr>
					
					<td colspan='2'>
						<textarea name='content' rows='4' cols='50'>{$blog_r['content']}</textarea> 
					</td>
				</tr>
				<tr>
					
					<td colspan='2'>
						<input type='submit' value='Save'/>
					</td>
				</tr>
				
	";
		
	echo "
					
			</table>
		</form>
		";