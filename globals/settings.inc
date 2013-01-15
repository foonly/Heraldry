<?php


// Database Settings
$db[type] = "pg"; // mysql or pg
$db[server] = "db.uplink.fi";
$db[port] = 5432; // 3306 for mysql & 5432 for postgresql
$db[user] = "postgres";
$db[password] = "";
$db[name] = "uudb";

$setting[schema]="heraldry";
$setting[site_uri]="heraldry.dev.uplink.fi";
$setting[title]="Uplink Heraldry Site";
$setting[rpath]="";
$setting[apath]="/var/www/web/dev/heraldry";
$setting[tmppath]="/var/www/tmp";
$setting[imgpath]="/headers/img";
$setting[imgcache]="/var/www/imgcache";
$setting[svgbase]=$setting[apath]."/svg_base";
$setting[pass_salt] = "xt0LrNoS";
$setting[dev] = 1;
$setting[css] = array("base");

$site = 11;

$locale="en";

$lvlnm[0] = "Read Only";
$lvlnm[1] = "User";
$lvlnm[2] = "Editor";
$lvlnm[3] = "Moderator";
$lvlnm[4] = "Content Admin";
$lvlnm[5] = "Section Admin";
$lvlnm[6] = "Site Admin";

$css .= "
		<link href='css/base.css' rel='stylesheet' type='text/css' media='screen'/>";

$css .= "
        <link href='/heraldry/headers/heraldry.css' rel='stylesheet' type='text/css' media='screen'/>
        <!--[if IE]>
            <link href='/heraldry/headers/heraldry_ie.css' rel='stylesheet' type='text/css' media='screen'/>
        <![endif]-->
        ";


?>
