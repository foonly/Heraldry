<?php

$returl = "?template=charge&id=$_POST[id]";

if ( isset($_POST["del"]) && isset( $_POST['id'] ) ) {
	$query = "
		delete	
		from		$setting[schema].charges
		where		id = $_POST[id]
		";
	pg_query($conn,$query);	
} else {
	/*
	$query = "
		select	body
		from		$setting[schema].charges
		where		id = $id
		";
	$ch_r = pg_get($conn,$query);
	$body = $ch_r[body];
	*/
	$body = $_POST[svg];
	if (strlen($_POST[details]))
		$det = explode(",",trim($_POST[details]," ,"));
	else
		$det = Array();

	if (is_array($_POST[colours])) {
		foreach ($_POST[colours] as $c) {
			$t = $_POST[$c];
			if (strlen($t)) {
				if ($t == "base")
					$_POST[proper] = $c;
				else
					$det[] = "$t:$c";
				$body = preg_replace("/((fill|stroke)[ =\"':]+)$c/i","\\1#".strtoupper($t)."#",$body);
			}
		}
	}
	$query = "
		update	$setting[schema].charges
		set		name = '".strtolower($_POST[name])."',
					charge_group = '".$_POST[charge_group]."',
					height = '".$_POST[height]."',
					width = '".$_POST[width]."',
					variation = '".strtolower($_POST[variation])."',
					body = '".addslashes($body)."',
					details = '".strtolower(implode(",",$det))."',
					proper = '".strtolower($_POST[proper])."'
		where		id = $_POST[id]
		";
	pg_query($conn,$query);
}

if (isset($_POST["exit"]) || isset($_POST["del"]))
	$returl = "?template=charge_list";

?>