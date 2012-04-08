<?php

echo "
	<div class='rpg'>
		<a href='/'>RPG</a> / <a href='?template=main'>Heraldry</a>
	</div>
	";
if ($_SESSION[id]) {
	echo "
		<div class='user'>
		";
	include("user.inc");
	echo "
		</div>
		";	
} else {
	echo "
		<div class='user'>
			<a href='../?template=login'>Login</a>
		</div>
		";	
}
include("menu.inc");
echo "	
	<div class='main'>
	";
?>