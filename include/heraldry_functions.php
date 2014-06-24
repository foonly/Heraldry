<?php

function renderSVG ($coa = Array()) {
	global $setting, $tinct;

	if (!$coa[lineing]) $coa[lineing] = "FFFFFF";
	if (!$coa[mantling]) $coa[mantling] = "FFFFFF";
	if (!$coa[field]) $coa[field] = "inner";
	if (!$coa[divcol1]) $coa[divcol1] = "CCCCCC";
	if (!$coa[divcol2]) $coa[divcol2] = "AAAAAA";
		
	$base = "";
	if ($handle = fopen("$setting[svgbase]/base.svg","r")) {
 		while (!feof($handle)) {
			$base .= fgets($handle, 4096);
		}
		fclose($handle);		
	}

	$base = str_replace("#BANNER#",$coa[banner],$base);
	$base = str_replace("#NAME#",$coa[name],$base);
	$base = str_replace("#INNER#",$tinct[$coa[lineing]],$base);
	$base = str_replace("#OUTER#",$tinct[$coa[mantling]],$base);
	
	$shield = renderShield($coa[field],$coa[division],$coa[divline],$coa[divcol1],$coa[divcol2],$coa[ordinaries],$coa[charges]);
	$base = str_replace("#SHIELD#",$shield,$base);

	return $base;
}

function renderShield ($field,$division,$divline,$divcol1,$divcol2,$ordinaries=Array(),$charges=Array()) {
	global $setting, $tinct, $chargesize, $chargecol, $chargerow, $row, $col;

	// Base Shield
	$shield = "";
	if ($handle = fopen("$setting[svgbase]/shield.svg","r")) {
 		while (!feof($handle)) {
			$buffer = fgets($handle, 4096);
			$shield .= $buffer;
		}
		fclose($handle);		
	}
	$shield = str_replace("#FIELD#",$tinct[$field],$shield);

	// Division
	$div = "";
	if (strlen($division)) {
		if ($handle = fopen("$setting[svgbase]/div_$division.svg","r")) {
 			while (!feof($handle)) {
				$buffer = fgets($handle, 4096);
				$div .= $buffer;
			}
			fclose($handle);		
		}
		$div = str_replace("#DIV#",$tinct[$divcol1],$div);
		$div = str_replace("#DIV1#",$tinct[$divcol1],$div);
		$div = str_replace("#DIV2#",$tinct[$divcol2],$div);
		if (strlen($divline)) {
			$sea = '<g id="'.$divline.'" display="none">';
			$rep = '<g id="'.$divline.'">';
			$div = str_replace($sea,$rep,$div);
			$sea = '<g id="plain">';
			$rep = '<g id="plain" display="none">';
			$div = str_replace($sea,$rep,$div);
		}
	}
	$shield = str_replace("#DIVISION#",$div,$shield);

	// Ordinaries
	$ord = "";
	if (is_array($ordinaries)) {
		foreach ($ordinaries as $o) {
			if (strlen(trim($o[tp]))) {
				if ($handle = fopen("$setting[svgbase]/ord_$o[tp].svg","r")) {
		 			while (!feof($handle)) {
						$buffer = fgets($handle, 4096);
						$ord .= $buffer;
					}
					fclose($handle);
					$ord = str_replace("#ORD#",$tinct[$o[col]],$ord);
				}
			}
		}
	}
	$shield = str_replace("#ORDINARIES#",$ord,$shield);

	// Charges
	$chg_text = "";
	if (is_array($charges)) {
		foreach ($charges as $chg) {
			$chg_text .= '
				<g id="charge'.$chg[pos].'" transform="translate('.$chargecol[$chg[size]][$col[$chg[pos]]].' '.$chargerow[$chg[size]][$row[$chg[pos]]].') scale('.$chargesize[$chg[size]].')">
					'.renderCharge($chg[variation],$chg[base],$chg[heading],$chg[details]).'
				</g>			
				';
		}
	}
	$shield = str_replace("#CHARGE#",$chg_text,$shield);
	
	return $shield;
}
function renderCharge ($id,$basecol="",$heading=0,$details=Array()) {
	global $conn, $setting;

	$size=100;

	if ($id) {
		$sql = "
			select	height,
						width,
						body,
						proper,
						details
			from		$setting[schema].charge_var
			where		id = ?
			";
		$ch = $GLOBALS['db']->prepare($sql);
        $ch->execute(array($id));
		$ch_r = $ch->fetch();
		
		$th = 0;
		$tw = 0;
		$diff = abs($ch_r[width] - $ch_r[height]) / 2;
		if ($ch_r[width] > $ch_r[height]) {
			$scale = $size / $ch_r[width];
			$th = $diff;
		} else {
			$scale = $size / $ch_r[height];
			$tw = $diff;
		}
		if (!strlen($basecol) || $basecol == "proper")
			$basecol = $ch_r[proper];
		$body = str_replace("#BASE#",checkTin($basecol),$ch_r[body]);
		$det = explode(",",$ch_r[details]);
		foreach ($det as $d) {
			$c = explode(":",$d,2);
			if (count($c) <= 1)
				$c[1] = $ch_r[proper];
			if (!strlen(trim($details[$c[0]])))
				$details[$c[0]] = $c[1];
			$body = str_replace("#".strtoupper($c[0])."#",checkTin($details[$c[0]]),$body);
		}
		//$scale = $scale /1.3;
		if ($heading == 1)
			$flip = " scale(-1 1) translate(-100) ";
		$svg = '
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				width="100%" height="100%" viewBox="0 0 '.$size.' '.$size.'" xml:space="preserve">
				<g id="charge" transform="'.$flip.'scale('.$scale.') translate('.$tw.' '.$th.')">
					'.$body.'
				</g>
			</svg>';
	}

	return $svg;
}
function coatOfArms($id) {
	global $conn, $setting;
	$query = "
		select	definition
		from		$setting[schema].coatofarms
		where		id = $id
		";
	$co_r = pg_get($conn,$query);
	return unserialize($co_r[definition]);
}

function listSvg ($choice,$tp="div",$name="division") {
	global $setting;
	$ret = "";
	$var = var_glob("$setting[svgbase]/".$tp."_*.svg");
	array_unshift($var,"");	
	foreach ($var as $v) {
		$d = ucwords(str_replace("_", " ", $v));
		if (!strlen($d))
			$d = "None";
		if ($choice == $v) $sel = " checked='checked'"; else $sel = "";
		$ret .= "
			<div class='sel".ucfirst($tp)."'>
				<input class='sel".ucfirst($tp)."' type='radio' name='$name' id='".$name."_".$v."' value='$v'$sel/>
				<label class='sel".ucfirst($tp)."' for='".$name."_".$v."'>
					<div style='height: 60px;'>
					";
				switch ($tp) {
					case "div":
						$ret .= "
							<img src='render.php?type=shield&amp;size=50&amp;fld=azure&amp;div=$v&amp;dcl1=gules&amp;format=png' alt='$v' />
							";
					break;
					case "ord":
						if (strlen($v))
							$val = $v."_gules";
						else
							$val = "";
						$ret .= "
							<img src='render.php?type=shield&amp;size=50&amp;fld=azure&amp;ord=$val&amp;format=png' alt='$val' /> 
							";
					break;
				}
				$ret .= "
					</div>
					<div>
					$d
					</div>
				</label>
			</div>
			";
	}
	return $ret;
}

function checkTin ($tin) {
	global $tinct;
	
	if (strlen($tinct[$tin]))
		return $tinct[$tin];
	elseif (substr($tin,0,1) == "#")
		return $tin;
	else
		return "#".$tin;
}

function listTin ($name,$choice,$tp=0,$proper="") {
	global $conn, $setting;
	
	if ($tp)
		$whe = "where	tp in ($tp)";
	$query = "
		select	id,
					colour
		from		$setting[schema].tinctures
		$whe
		order by	tp, id
		";
	$ti = pg_query($conn,$query);
	do {
		if ($ti_r[id] || $proper != "") {
			if (!$ti_r[id]) {
				$ti_r[id] = "proper";
				$ti_r[colour] = $proper;	
			}
			if ($choice == "")
				$choice = $ti_r[id];
			if ($choice == $ti_r[id]) $sel = " checked='checked'"; else $sel = "";
			$ret .= "
				<div class='selTin'>
					<input class='selTin' type='radio' name='$name' id='".$name."_".$ti_r[id]."' value='$ti_r[id]'$sel/>
					<label class='selTin' for='".$name."_".$ti_r[id]."' style='background: $ti_r[colour]; color: ".invertHex($ti_r[colour]).";'>".ucwords($ti_r[id])."</label>
				</div>
				";
		}
	} while ($ti_r = pg_fetch_array($ti));
	return $ret;
}

function listLine ($file,$choice,$name="divline") {
	global $conn, $setting;
	if (file_exists("$setting[svgbase]/$file")) {
		$div = "";	
		if ($handle = fopen("$setting[svgbase]/$file","r")) {
			while (!feof($handle)) {
				$buffer = fgets($handle, 4096);
				$div .= $buffer;
			}
			fclose($handle);		
		}
	}
}

function blazon ($coa) {
	global $conn, $setting;

	$pos[1] = "chief dexter ";	
	$pos[2] = "chief ";	
	$pos[3] = "chief sinister ";	
	$pos[4] = "dexter ";	
	$pos[5] = "";	
	$pos[6] = "sinister ";	
	$pos[7] = "base dexter ";	
	$pos[8] = "base ";	
	$pos[9] = "base sinister ";	
	
	if ($coa[division])
		$ret .= "parted ".$coa[division]." ".$coa[field]." and ".$coa[divcol1];
	else
		$ret .= $coa[field];
	if (is_array($coa[ordinaries])) {
		foreach ($coa[ordinaries] as $o) {
			if ($o[tp])
				$ret .= ", ".$o[tp]." ".$o[col];
		}
	}
	if (is_array($coa[charges])) {
		foreach ($coa[charges] as $c) {
			if ($c[variation]) {		
				$query = "
					select	name,
								variation
					from		$setting[schema].charges
					where		id = $c[variation]
					";
				$ch_r = pg_get($conn,$query);
				if ($c[heading]) $h = " toward sinister"; else $h = "";
				$ret .= ", ".$pos[$c[pos]].$ch_r[name]." ".$ch_r[variation].$h." ".$c[base];
				$pk = "";
				$pd = "";
				$dret = "";
				$cc = $c[base];
				if (is_array($c[details])) {
				asort($c[details]);
					foreach ($c[details] as $k => $d) {
						if ($pd != $cc) {				
							if ($pd == $d)				
								$dret .= " $pk and";
							else				
								$dret .= " $pk $pd";
							$pk = $k;
							$pd = $d;
						}				
					}
				}
				if ($pd != $cc) {				
					$dret .= " $pk $pd";
				}
				if (strlen(trim($dret)))
					$ret .= trim(",".$dret);
			}
		}
	}
	return ucfirst(trim(str_replace("_"," ",$ret))).".";
}
