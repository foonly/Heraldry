<?php

// Copy this file to settings.inc on deployment.

// Database Settings
$setting['db']['type'] = "pgsql"; // mysql or pgsql
$setting['db']['server'] = "localhost"; // hostname or ip
$setting['db']['port'] = 5432; // 3306 for mysql & 5432 for postgresql
$setting['db']['user'] = "postgres";
$setting['db']['password'] = "mac1ntosh";
$setting['db']['name'] = "heraldry";

$setting['schema']="public";
$setting['site_uri']="";
$setting['title']="Uplink Heraldry Site";
$setting['rpath']="";
$setting['apath']="/var/www/web/dev/heraldry";
$setting['tmppath']="/var/www/tmp";
$setting['imgpath']="";
$setting['imgcache']="";
$setting['svgbase']=$setting['apath']."/svg_base";
$setting['dev'] = 1;
$setting['css'] = array("base");

$locale="en";

?>