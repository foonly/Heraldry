<?php

echo "
	<div class='buttonrow'>
		<a href='?template=arms_display&amp;main=$_GET[main]&amp;group=$_GET[group]'>
			<div class='button'>
				Back to list
			</div>
		</a>
		
		<a href='?template=edit&amp;main=$_GET[main]&amp;edgr=$_GET[group]'>
			<div class='button'>
				New Coat of Arms
			</div>
		</a>";
	if	($_GET[template] == 'arms') {
		echo "
		
		<a href='$link'>
			<div class='button'>
				Edit Shield
			</div>
		</a>
		
		<a href='$setting[rpath]/render.php?type=coa&amp;id=$_GET[id]&amp;format=svg'>
			<div class='button'>
				Show as SVG
			</div>
		</a>
		
		<a href='$setting[rpath]/render.php?type=coa&amp;id=$_GET[id]&amp;format=pdf'>
			<div class='button'>
				Show as PDF
			</div>
		</a>
		";
	}
	
	
	echo "
	</div>
	";
?>