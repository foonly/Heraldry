<?php


// Database Settings
$db[type] = "pg"; // mysql or pg
$db[server] = "db.uplink.fi";
$db[port] = 5432; // 3306 for mysql & 5432 for postgresql
$db[user] = "postgres";
$db[password] = "";
$db[name] = "uudb";

$setting[schema]="rpg"; // the database table
$setting[site_uri]="rpg.uplink.fi"; // the base url of the site
$setting[title]="Uplink RPG Site"; // the base title of the site
$setting[section]="*";
$setting[rpath]="";
$setting[apath]="/var/www/web/dev/rpg"; 
$setting[tmppath]="/var/www/tmp"; // temp path
$setting[imgpath]="/headers/img";
$setting[imgcache]="/var/www/imgcache";
$setting[pass_salt] = "xt0LrNoS"; 
$setting[dev] = 1;
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
		<link href='/headers/base.css' rel='stylesheet' type='text/css' media='screen'/>";

?>