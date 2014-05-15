

	<div>
		<h2 class='header'>Uplink Heraldry Generator</h2>
		<a href='?template=edit'>
			<div class='button'>
				Create Coat of Arms
			</div>
		</a>
		<br/>
		<br/>
		<p class='text'>
			A utility for generating coat of arms.
		</p>
		<img src='headers/img/icon_main.png' class='mainimg' alt=''></img>
		<p class='text'>
			With this web based editor you can create your own Coat of Arms. You can start creating immediately by following the link above, or you can browse ready made coats of arms via the menu on the left.
		</p>
		<p class='text'>
			In the editor you can save your work by bookmarking the page, or if you just want the finished product, you can save it as a PNG or PDF via the links in the editor.
		</p>
		<a href='?template=blog'>
		<h2 class='header'>News about the site</h2>
		</a>
	</div>

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