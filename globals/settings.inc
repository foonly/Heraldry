<?php

// Database Settings
$db[type] = "pg"; // mysql or pg
$db[server] = "db.uplink.fi";
$db[port] = 5432; // 3306 for mysql & 5432 for postgresql
$db[user] = "heraldry";
$db[password] = "";
$db[name] = "heraldry";

$setting[schema]="public";
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

$locale="en";

$lvlnm[0] = "Read Only";
$lvlnm[2] = "User";
$lvlnm[4] = "Advanced User";
$lvlnm[6] = "Contributor";
$lvlnm[8] = "Content Admin";
$lvlnm[10] = "Admin";

?>
