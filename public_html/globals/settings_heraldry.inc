<?php

$setting[schema]="heraldry";
$setting[section]="heraldry";
$setting[apath].="/heraldry";
$setting[rpath].="/heraldry";
$setting[svgbase]=$setting[apath]."/svg_base";
$setting[title].=" - Heraldry";

$css .= "
		<link href='/heraldry/headers/heraldry.css' rel='stylesheet' type='text/css' media='screen'/>
		<!--[if IE]>
			<link href='/heraldry/headers/heraldry_ie.css' rel='stylesheet' type='text/css' media='screen'/>
		<![endif]-->
		";

$detail_colour = Array("base","armed","langued","pizzled","attired","unguled","crined","fructed","leaved","barbed","incensed","flammant");

?>