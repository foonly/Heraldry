<?php

if ($lvl < 4) {
	echo "Permission Denied";
	return;
}

echo "
	<h2 class='header'>Admin</h2>
	<ul class='biglist'>
		<li><a href='?template=charge_list&amp;cgroup=0'>List of Charges</a></li>
		<li><a href='?template=charge_group_list'>List of Charge Groups</a></li>
		<li><a href='?template=groups'>Groups for Coat of Arms</a></li>
		<li><a href='?template=blog_list'>Blog</a></li>
	</ul>
	";

?>