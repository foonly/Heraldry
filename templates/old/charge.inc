<?php

if ($lvl < 4) {
	echo "Permission Denied";
	return;
}


$query = "
	select	name,
				variation,
				height,
				width,
				body,
				proper,
				details,
				charge_group
	from		$setting[schema].charges
	where		id = $_GET[id]
	";
$ch_r = pg_get($conn,$query);

preg_match_all("/(fill|stroke)[ =\"':]+(#[0-9a-f]{6})/i",$ch_r[body],$matches);

$col = array_unique($matches[2]);

if (!$_GET[sup])
	echo "<div style='float: right; width: 300px; height: 300px; border: 1px solid #000;'>".renderCharge($_GET[id])."</div>";

echo "
<a style='float:left;' href='?template=charge_group_list'><div class='button'>Back to list</div></a>
<h3 class='header'>Charge</h3>
	<form action='transaction/?template=charge' method='post'>
		<input type='hidden' name='cval' value='$csum'/>
		<input type='hidden' name='id' value='$_GET[id]'/>
		<label for='name'>Group:</label><input type='text' name='charge_group' value='$ch_r[charge_group]'/><br/>
		<label for='name'>Name:</label><input type='text' name='name' value='$ch_r[name]'/><br/>
		<label for='variation'>Variation:</label><input type='text' name='variation' value='$ch_r[variation]'/><br/>
		<label for='width'>Size (WxH):</label><input type='text' class='short' size='4' name='width' value='$ch_r[width]'/> X
		<input type='text' class='short' size='4' name='height' value='$ch_r[height]'/><br/>
		<label for='proper'>Base Color:</label><input type='text' name='proper' value='$ch_r[proper]'/><br/>
		<label for='details'>Detail:</label><input type='text' name='details' value='$ch_r[details]'/><br/>
		
		";
foreach ($col as $c) {
	echo "
		<label for='colours[]'>Unmapped:</label><input type='hidden' name='colours[]' value='$c'/>
		<select id='$c' name='$c'>
			<option value=''>Keep</option>
			";
		foreach ($detail_colour as $dc) {
			echo "<option value='$dc'>$dc</option>";
		}
		echo "
		</select>		
		<label for='$c' style='width: 80px; background-color: $c; color: ".invertHex($c)."'>$c</label>
		<br/>";	
}
echo "
		<br/>
		<input type='submit' value='Save'/>
		<input type='submit' name='exit' value='Save &amp; Exit'/>
		<input type='submit' name='del' value='Delete' onclick='return confirm(\"Are you sure?\");'/>
		<br/>
		
		<label for='svg' style='clear:right;'>SVG Code:</label>
		<textarea id='svg' name='svg' cols='40' rows='15' style='width: 100%;'>".htmlentities($ch_r[body],ENT_NOQUOTES,"UTF-8")."</textarea><br/>
	</form>
	";

?>