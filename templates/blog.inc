<a href='?template=blog'>
		<h2 class='header'>News about the site</h2>
</a>

<?php
	$query = "
	select	id,
				header,
				content,
				postdate
	from		$setting[schema].blog
	order by postdate
	";
$bl = pg_query($conn,$query);

while ($bl_r = pg_fetch_array($bl)) {
	echo "
		<div class='post mainpost'>
			<a href='?template=blog_item&amp;id=$bl_r[id]'>
				<h3 class='header'>$bl_r[header] - $bl_r[postdate]</h3>
			</a>
			<p class='text'>
				$bl_r[content]
			</p>
		</div>
		";
}

?>