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
				<a href='?template=blog_list'>
					<div class='pathitem'>
						News
					</div>
				</a>
				<a href='?template=blog_edit&amp;blogid=$blogid'>
					<div class='pathitem'>
						News Edit
					</div>
				</a>
			</div>
			<div class='actions'>
				
			</div>
		</div>
		
		<form action='transaction.php?t=blog_com' method='post' id='blogcom'>
		<input type='hidden' name='userid' value='{$user->getId()}'/>
		<input type='hidden' name='blogid' value='$blogid'/>
			<table>
				<tr>
					<th style='text-align: left;'>
						Comment to {$blog_r['header']}
					</th>
					
				</tr>
				
				<tr>
					
					<td>
						<textarea name='comment' rows='4' cols='50'></textarea> 
					</td>
				</tr>
				<tr>
					
					<td>
						<input type='submit' value='Save'/>
					</td>
				</tr>
				
	";
		
	echo "
					
			</table>
		</form>
		";