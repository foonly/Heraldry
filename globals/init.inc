<?php

session_start();

include "settings.inc";

require "local_functions.inc";
require "functions.inc";
require "basic_html.inc";
require "db_functions.inc";
require "xml_extra_functions.inc";

require "heraldry_functions.inc";
require "definition.inc";

spl_autoload_register('classloader');

$conn = db_connect();
$today = time();

$dsn = "{$setting['db']['type']}:dbname={$setting['db']['name']};host={$setting['db']['server']}";
$db = new db($dsn,$setting['db']['user'],$setting['db']['password']);

if ($_GET[template] == "logout") {
	$_SESSION[id] = 0;
	$_SESSION[mon] = 0;
	$_GET[template] = "main";
}

if (!$_SESSION[id])
	$_SESSION[id] = 0;
if (!$_SESSION[check] || !isset($_COOKIE[check])) {
	$_SESSION[check] = rand(0,100000);
	setcookie ("check", $_SESSION[check], 0, "/");
}


$csum = md5($_SESSION[check]);

$lvl = getlvl($_SESSION[id]);

if (strstr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml")) {
	$contenttype = "application/xhtml+xml";
	$xhtml = 1;
} else {
	$contenttype = "text/html";
	$xhtml = 0;
}

if (!isset($_GET['template']))
    $_GET['template'] = "main";

$query = "
    select
        id,
        colour
    from
        $setting[schema].tinctures
    ";
$ti = pg_query($conn,$query);
while ($ti_r = pg_fetch_array($ti)) {
    $tinct[$ti_r['id']] = $ti_r['colour'];
}

echo header("Content-type: $contenttype; charset=utf-8"); 

?>