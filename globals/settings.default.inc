<?php

// Database Settings
$db[type] = "pg"; // mysql or pg
$db[server] = ""; // hostname or ip
$db[port] = 5432; // 3306 for mysql & 5432 for postgresql
$db[user] = "";
$db[password] = "";
$db[name] = "";

$setting[schema]="public";
$setting[site_uri]="";
$setting[title]="Uplink Heraldry Site";
$setting[rpath]="";
$setting[apath]="";
$setting[tmppath]="";
$setting[imgpath]="";
$setting[imgcache]="";
$setting[svgbase]=$setting[apath]."/svg_base";
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
