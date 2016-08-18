<?php



$query = "
	select	id,
				header,
				content,
				postdate
	from		$setting[schema].blog
	where 		id = $_GET[id]
	";
$bl_r = pg_get($conn,$query);


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
	<br/>
	
	<form action='transaction/?template=comment' method='post'>
		<input type='hidden' name='cval' value='$csum'/>
		<input type='hidden' name='parent' value='$bl_r[id]'/>
		<label for='header'>Your name:</label><input type='text' name='header' value=''/><br/>
		<label for='content'>Comment:</label><br/>
		<textarea id='content' name='content' cols='40' rows='15' style='width: 100%;'></textarea><br/>
		
		<input type='submit' value='Save'/>
	</form>
	";

?>