

<?php
	$query = "
	select	id,
				header,
				content,
				postdate
	from		$setting[schema].blog
	where id = $_GET[id]
	";
$bl_r = pg_get($conn,$query);

$query = "
	select	id,
				parent,
				poster,
				content,
				postdate
	from		$setting[schema].comments
	where parent = $_GET[id]
	";
$cm = pg_query($conn,$query);

	echo "
		<a href='?template=blog'>
			<div class='button'>
				News List
			</div>
		</a>
		<br/>
		<div class='post mainpost'>
		<h3 class='header'>$bl_r[header] - $bl_r[postdate]</h3>
	
		<p class='text'>
			$bl_r[content]
		</p>
		</div>
		<br/>
		<a href='?template=blog_comment&amp;id=$bl_r[id]'>
				<div class='button'>
					Comment
				</div>
		</a>
		<br/>
		<h4 class='header'>Comments:</h4>
		";
	while ($cm_r = pg_fetch_array($cm)) {
		echo "
		<div class='post comment'>
		<h4 class='header'>$cm_r[poster] - $cm_r[postdate]</h4>
	
		<p class='text'>
			$cm_r[content]
		</p>
		</div>
		";
	}
	
?>