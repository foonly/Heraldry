<?php

echo "
	<a href='?template=arms_list' class='userbutton'>My Arms</a>
	";
	if ($lvl >= 3) {
		echo "
			<a href='?template=arms_list&amp;show=all' class='userbutton'>All Arms</a>
			";
	}
	if ($lvl >= 4) {
		echo "
			<a href='?template=admin'>Admin</a>
			";
	}

?>