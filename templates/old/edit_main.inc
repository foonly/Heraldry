<?php

$tab_flds = Array("name","gr","banner","mantling","lineing");

if ($_GET[edgr])
	$coa[gr] = $_GET[edgr];

if ($_GET[main]) $asql = "where	main = '$_GET[main]'";
$query = "
	select	id,
				main,
				sub
	from		$setting[schema].groups
	$asql
	order by	main, so, sub
	";
$gg = pg_query($conn,$query);

if ($_GET[id])
	$save = "<input type='submit' name='savecopy' value='Save Copy'/>";

echo "
	<label for='name'>Name:</label> <input type='text' id='name' name='name' value='$coa[name]'/><br/>
	<label for='gr'>Group:</label>
	<select id='gr' name='gr'>
		<option value='0'>Select</option>
	";
while ($gr_r = pg_fetch_array($gg)) {
	if ($gr_r[id] == $coa[gr]) $sel = " selected='selected'"; else $sel = "";
	echo "<option value='$gr_r[id]'$sel>$gr_r[main]: $gr_r[sub]</option>";	
}
echo "
	</select>
	<input type='submit' name='save' value='Save'/> $save 
	<hr/>
	<label for='banner'>Banner:</label> <input type='text' id='banner' name='banner' value='$coa[banner]'/>
	<input type='button' value='Translate to Latin' onclick='window.open (\"http://translate.google.com/#auto|la|\"+this.form.banner.value,\"translate\",\"width=900,height=350\");'/>
	<br/>
	<br/>
	Mantling:<br/>
	".listTin("mantling",$coa[mantling],"1,2")."						
	<br class='clear'/>
	Lineing:<br/>
	".listTin("lineing",$coa[lineing],"1,2")."
	<br class='clear'/>
	<br class='clear'/>
	";

?>