<?php

$tab_flds = Array("ordinaries");

// Clean up ord array
for ($i=count($coa[ordinaries])-1;$i>=0;$i--) {
	if (!$coa[ordinaries][$i][tp])
		array_splice($coa[ordinaries],$i,1);
}


// Cause first selector to always show
if (!isset($coa[ordinaries][0]))
	$coa[ordinaries][0] = Array("tp" => "","col" => "");

// Add new ordinary
if (isset($_GET[add_ord]))
	$coa[ordinaries][] = Array("tp" => "","col" => "");

foreach ($coa[ordinaries] as $k => $v) {
	echo "
		Ordinary:<br/>
		".listSVG($v[tp],"ord","ordinaries[$k][tp]")."
		<br class='clear'/>
		Colour:<br/>
		".listTin("ordinaries[$k][col]",$v[col])."						
		<br class='clear'/>
		<hr/>
		";
}
echo "
	<input type='submit' name='add_ord' value='Add Ordinary'/>
	";

?>