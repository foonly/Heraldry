<?php

echo "
	<div class='armscontainer'>
		<h2 class='header'>Coat Of Arms - My Arms</h2>
		<table class='armslist'>
			<tr>
				<th></th>
				<th><a href='?template=arms_list&amp;show=$_GET[show]&amp;sort=nam'>Name</a></th>
				<th><a href='?template=arms_list&amp;show=$_GET[show]&amp;sort=group'>Group</a></th>
				<th><a href='?template=arms_list&amp;show=$_GET[show]&amp;sort=dati'>Date</a></th>
				<th><a href='?template=arms_list&amp;show=$_GET[show]&amp;sort=creator'>Creator</a></th>
			</tr>
			";
		switch($_GET[sort]) {
			case "dati":
				$sr = "coa.dati desc";
			break;
			case "creator":
				$sr = "users.lname, users.fname";
			break;
			case "group":
				$sr = "groups.main, groups.sub";
			break;
			default:
				$sr = "coa.nam";
			break;
		}
		if ($_GET[show] != "all" || $lvl < 3) {
			$where = "and		coa.creator = '$_SESSION[id]'";
		} else {
			$so = "approved,";
		}
		$query = "
			select	coa.id,
						coa.nam,
						date_part('epoch',coa.dati) as dati,
						coa.banner,
						coa.private,
						coa.approved,
						users.fname,
						users.lname,
						groups.main,
						groups.sub
			from		$setting[schema].coatofarms coa left join
						users
			on			coa.creator = users.id left join
						$setting[schema].groups
			on			coa.gr = groups.id
			where		(coa.private = false
			or			coa.creator = '$_SESSION[id]')
			$where
			order by	$so $sr, nam, id
			";
		$ca = pg_query($conn,$query);
		while ($ca_r = pg_fetch_array($ca)) {
			$link = "?template=arms&amp;id=$ca_r[id]&amp;main=$_GET[main]&amp;group=$_GET[group]";
			$pri = "";			
			if ($ca_r['approved'] != "t") $pri = " (Not Approved)";
			if ($ca_r['private'] == "t") $pri = " (Private)"; 
			echo "
				<tr>
					<td style='width: 60px;'>
						<a href='$link'>
							<img src='$setting[rpath]/render.php?type=coa&amp;size=60&amp;id=$ca_r[id]&amp;format=png'/><br/>
						</a>
					</td>
					<td>
						<a href='$link'>
							$ca_r[nam] $pri
						</a>
					</td>
					<td>
						<a href='$link'>
							$ca_r[main] - $ca_r[sub]
						</a>
					</td>
					<td>
						<a href='$link'>
							".date("d-m-Y",$ca_r[dati])."
						</a>
					</td>
					<td>
						<a href='$link'>
							$ca_r[lname], $ca_r[fname]
						</a>
					</td>
					<td>
						<a href='$link' onclick='return confirm(\"Are you sure?\");'>
							Delete
						</a>
					</td>
				</tr>
				";
		}
		echo "
			</table>
	</div>
	";

?>