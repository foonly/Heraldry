<?php

$query = "
	select 	groups.id,
				groups.main,
				groups.sub,
				count(coa.id) as num
	from		$setting[schema].groups left join
				$setting[schema].coatofarms coa
	on			groups.id = coa.gr
	group by	groups.id, groups.main, groups.so, groups.sub
	order by	groups.main, groups.so, groups.sub
	";
$gm = pg_query($conn,$query);

echo "
	<div class='menu'>
		<ul>
	";
$main = "";
while ($gm_r = pg_fetch_array($gm)) {
	if ($gm_r[num]) {
		if ($main != $gm_r[main]) {
			$main = $gm_r[main];
			echo "
				<li class='main'><a href='?template=arms_display&amp;main={$main}'>{$main}</a></li>
				";
		}
		echo "<li class='sub'><a href='?template=arms_display&amp;main={$main}&amp;group=$gm_r[id]'>$gm_r[sub]</a></li>";
	}
}

echo "
		</ul>
	</div>
	";

?>
