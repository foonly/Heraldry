<?php

$tabs = Array("main","division","ordinaires");

$coa = unserialize($_GET[coa]);
if (!isset($coa[mantling])) {
	$coa[mantling] = "azure";	
	$coa[lineing] = "argent";	
	$coa[field] = "argent";	
}

if (!is_array($coa[charges]))
	$coa[charges] = Array();

// Write edited variables into $coa
if ($tab_flds = unserialize($_GET[tabfields])) {
	foreach ($tab_flds as $f) {
		if ($f == "charges") {
			$coa[$f][$_GET[editcharge]] = $_GET[$f];
		} else {
			$coa[$f] = $_GET[$f];
		}
	}
}

if (!$_GET[id])
	$_GET[id] = 0;

// Save CoA
if (isset($_GET[save]) || isset($_GET[savecopy])) {
	if ($lvl) {
		include("transaction/charge_save.inc");
		echo "Coat of Arms Saved.<br/><a href='?template=arms&amp;id=$_GET[id]'>Arms</a>";
	} else {
		echo "
			You don't have sufficient permissions to save.<br/>
			Press <a href='?template=edit&amp;id=$_GET[id]&amp;gr=$_GET[gr]&amp;coa=".serialize($coa)."'>here</a> to get back to the editor, and bookmark the page if you wish to save you coat of arms.<br/>
			You can save the finnished Coat of Arms by right-clicking <a href='render.php?type=coa&amp;coa=".serialize($coa)."&amp;format=png'>PNG</a> or <a href='render.php?type=coa&amp;coa=".serialize($coa)."&amp;format=pdf'>PDF</a> and choosing Save links as..			
			";
	}
	return;
}

// Tab Management
if (isset($_GET[newtab]))
	$tab = $_GET[newtab];
else if (isset($_GET[tab]))
	$tab = $_GET[tab];
else
	$tab = "main";


if (isset($_GET[chargeadd])) {
	$coa[charges][][pos] = 5;
	$_GET[next] = 1;
}
if (isset($_GET[chargedel])) {
}

foreach ($coa[charges] as $k => $v) {
	$tabs[] = "charge ".($k+1);
}
$tabnr = array_search($tab,$tabs);	

if (isset($_GET[next]) && $tabnr < count($tabs))
	$tabnr++;
if (isset($_GET[prev]) && $tabnr > 0)
	$tabnr--;
$tab = $tabs[$tabnr];
// End of tab management

// Render tabs
$tabpart = explode(" ",$tab);
$editcharge = $tabpart[1]-1;
$tab_html = "<ul class='tabs'>";
foreach ($tabs as $k => $t) {
	if ($tab == $t) $sel = " selected"; else $sel = "";
	$tab_html .= "
		<li class='tab$k$sel'>
			<input type='submit' name='newtab' value='$t'/>
		</li>
		";	
}
$tab_html .= "</ul>";
// End of Render

// Control Buttons
if ($tabnr == 0)
	$dis = " disabled = 'disabled'";	
$button = "<input class='button' type='submit' name='prev' value='&lt;&lt; Prev'$dis/>";
$button .= "<input class='button' type='submit' value='Update'/>";
if ($tabnr < count($tabs)-1)
	$button .= "<input class='button' type='submit' name='next' value='Next &gt;&gt;'/>";
else
	$button .= "<input class='button' type='submit' name='chargeadd' value='Add Charge'/>";
if (substr($tab,0,6) == "charge")
	$button .= "<input class='button' type='submit' name='del' value='Delete Charge'/>";

echo "
	<form action='' method='get'>
		$tab_html
		<div class='editor'>
			<input type='hidden' name='template' value='$_GET[template]'/>
			<input type='hidden' name='id' value='$_GET[id]'/>
			<input type='hidden' name='main' value='$_GET[main]'/>
			<input type='hidden' name='tab' value='$tab'/>
			$button<br/><hr/>
			";
		include("edit_$tabpart[0].inc");
		echo "
			<input type='hidden' name='tabfields' value='".serialize($tab_flds)."'/>
			<input type='hidden' name='coa' value='".serialize($coa)."'/>
		</div>
	</form>
	";

echo "
	<div class='shield'>
	";
if ($xhtml)
	echo renderSVG($coa);
else
	echo "<img src='render.php?type=coa&amp;coa=".serialize($coa)."&amp;size=350&amp;format=png' alt=''/>";		
echo"
		<div class='viewbuttons'>
		<a href='render.php?type=coa&amp;coa=".serialize($coa)."&amp;format=png'><div class='button'>PNG</div></a>
		<a href='render.php?type=coa&amp;coa=".serialize($coa)."&amp;format=pdf'><div class='button'>PDF</div></a>
		</div>
	</div>
	";

echo "
	<div class='blazon'>
		<h3>Blazon (beta)</h3>
		<p>".blazon($coa)."</p>
	</div>
	";

if ($setting[dev])
	print_r($coa);

?>