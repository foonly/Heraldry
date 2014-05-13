<?php

// Copy this file to settings.inc on deployment.

// Database Settings
$setting['db']['type'] = "pgsql"; // mysql or pgsql
$setting['db']['server'] = ""; // hostname or ip
$setting['db']['port'] = 5432; // 3306 for mysql & 5432 for postgresql
$setting['db']['user'] = "";
$setting['db']['password'] = "";
$setting['db']['name'] = "";

$setting['schema']="public";
$setting['site_uri']="";
$setting['title']="Uplink Heraldry Site";
$setting['rpath']="";
$setting['apath']="/var/www/WebDev/Heraldry";
$setting['tmppath']="";
$setting['imgpath']="";
$setting['imgcache']="";
$setting['svgbase']=$setting['apath']."/svg_base";
$setting['dev'] = 1;
$setting['css'] = array("base");

$locale="en";

?>
