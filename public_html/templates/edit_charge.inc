<?php
$query = "
	select	id,
				name,
				so,
				cover
	from		$setting[schema].charge_group
	order by so
	";
$cgg = pg_query($conn,$query);


$tab_flds = Array("charges");

$sizetext = array("-1" => "Oversized","0" =>  "Full","1" => "Large","2" => "Medium","3" => "Small");

$cha = $coa[charges][$editcharge];

if (!$cha[pos])
	$cha[pos] = 5;
if (!$cha[angle])
	$cha[angle] = 0;

echo "
	<input type='hidden' name='editcharge' value='$editcharge'/>
	<input type='hidden' name='charges[angle]' value='".$cha[angle]."'/>
	<div class='leftcont'>
	<div class='sizeheading'>
		<label for='size'>Size:</label><br/>
		<select id='size' name='charges[size]'>
			";
	for ($s=-1;$s<4;$s++) {
		if ($s == $cha[size]) $sel = " selected='selected'"; else $sel="";
		echo "<option value='$s'$sel>$sizetext[$s]</option>";
	}
	if ($cha[heading]) {
		$hd1 = " checked='checked'";
		$hd0 = "";
	} else {
		$hd0 = " checked='checked'";
		$hd1 = "";
	}
	echo "
		</select>
		
		<br/>
		Heading:<br/>
		<div class='selHead'>
			<input class='selHead' type='radio' name='charges[heading]' id='heading0' value='0'$hd0/>
			<label class='selHead' for='heading0'>Toward Dexter</label>
		</div>
		<div class='selHead'>
			<input class='selHead' type='radio' name='charges[heading]' id='heading1' value='1'$hd1/> 
			<label class='selHead' for='heading1'>Toward Sinister</label>
		</div>
		</div>
		<br/>
		<br/>
		<br/>
		
		<div class='position'>
			Charge Position:<br/>
			<div class='chargepos'>
				".chargePos("charges[pos]",$cha[pos])."
		</div>
		</div>
	</div>
	
	
	<label for='cgg'>Charge Group:</label><br/>
	";
	while ($cgg_r = pg_fetch_array($cgg)) {
		echo "
		
		<div class='charge_group_list'>
			<img src='$setting[rpath]/render.php?type=charge&amp;size=50&amp;id=$cgg_r[cover]&amp;format=png' alt=''/>
			".ucwords($cgg_r[id])." 
			".ucwords($cgg_r[name])."
		</div>
		
		";
	}
	echo "
	<br/>
	<br/>
	<hr/>
	<label for='cg'>Charge:</label><br/>
	".selCharge("charges[cg]",$cha[cg])."
	<br class='clear'/>
	";
if (strlen($cha[cg])) {
	if (!$cha[variation]) {
		$query = "
			select	id,
						name,
						variation
			from		$setting[schema].charges
			where		name = '$cha[cg]'
			order by	variation
			";
		$ch_r = pg_fetch_array(pg_query($conn,$query));
		$cha[variation] = $ch_r[id];
	}
	echo selVariation("charges[variation]",$cha[cg],$cha[variation]);	
}

if ($cha[variation]) {
	$query = "
		select	proper,
					details
		from		$setting[schema].charges
		where		id = $cha[variation]
		";
	$ch_r = pg_get($conn,$query);
	if (substr($ch_r[proper],0,1) == "#")
		$proper = $ch_r[proper];
	elseif (!strlen($cha[base]))
		$cha[base] = $ch_r[proper];
	echo "	
		<br class='clear'/>
		Base:		
		<br class='clear'/>
		".listTin("charges[base]",$cha[base],"1,2,3",$proper)."
		";
	$dc = Array();
	foreach (explode(",",$ch_r[details]) as $d) {
		if (strlen($d)) {
			$c = explode(":",$d,2);
			if (!$cha[details][$c[0]])
				$cha[details][$c[0]] = $c[1];
			echo "	
				<br class='clear'/>
				".ucwords($c[0]).":		
				<br class='clear'/>
				".listTin("charges[details][$c[0]]",$cha[details][$c[0]],"1,2,3")."
				";
			$dc[] = $c[0]."-".${$det_nam};
		}
	}
}
echo "
	<br class='clear'/>
	<br class='clear'/>
	";

function chargePos ($name,$choice=0) {
	if (!$choice)
		$choice = 5;
	$ret = "
		<table class='chargepos' style='width: 100%; height: 100%'>
		";
	for ($r=1;$r<10;$r+=3) {
		$ret .= "<tr>";
		for ($c=$r;$c<$r+3;$c++) {
			if ($c == $choice) $che = " checked='checked'"; else $che = "";
			$ret .="
				<td>
					<input type='radio' name='$name' value='$c'$che/>
				</td>
				";
		}
		$ret .= "</tr>";
	}
	$ret .= "	
		</table>
		";
		
	return $ret;
}
function selCharge($name,$choice) {
	global $conn, $setting;
	$query = "
		select	DISTINCT name
		from		$setting[schema].charges
		order by	name
		";
	$ch = pg_query($conn,$query);
	$ret = "<select id='$name' name='$name' onchange='submit();'>";
	$ret .= "<option value=''>None</option>";
	while ($ch_r = pg_fetch_array($ch)) {
		if ($ch_r[name] == $choice) $sel = " selected='selected'"; else $sel = "";
		$ret .= "<option value='$ch_r[name]'$sel>".ucwords($ch_r[name])."</option>";
	}
	$ret .= "</select>";
	return $ret;
}
function selVariation($name,$charge,$choice) {
	global $conn, $setting;
	$query = "
		select	id,
					name,
					variation
		from		$setting[schema].charges
		where		name = '$charge'
		order by	variation
		";
	$ch = pg_query($conn,$query);
	while ($ch_r = pg_fetch_array($ch)) {
		if ($ch_r[id] == $choice) $sel = " checked='checked'"; else $sel = "";
		$ret .= "
			<div class='selVar'>
				<input onclick='submit();' class='selVar' type='radio' name='$name' id='".$ch_r[name]."_".$ch_r[id]."' value='$ch_r[id]'$sel/>
				<label class='selVar' for='".$ch_r[name]."_".$ch_r[id]."'>
					<div style='height: 100px;'>				
						<img src='render.php?type=charge&amp;id=$ch_r[id]&amp;size=80&amp;format=png' alt=''/>
					</div>
					<div>
					".ucwords($ch_r[name]." ".$ch_r[variation])."
					</div>
				</label>
			</div>
			";
	}
	return $ret;
}


?>