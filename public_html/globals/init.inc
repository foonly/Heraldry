<?php

session_start();

include("settings.inc");

require("local_functions.inc");
require("functions.inc");
require("basic_html.inc");
require("db_functions.inc");
require("uudb_functions.inc");
require("xml_extra_functions.inc");

$conn = db_connect();
$today = time();

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

// Cookie Stuff
$_SESSION[id] = uudbCookie($conn,$_SESSION[id],$site,$cookie);
if (isset($set_no_java))
	setcookie ("no_java", $set_no_java, time()+60*60*24*365, "/", ".uplink.fi");

$csum = md5($_SESSION[check]);

$_SESSION[mon] = log_session($conn,$site,$_SESSION[id],$_SESSION[mon]);

$lvl = getlvl($_SESSION[id]);

if (strstr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml")) {
	$contenttype = "application/xhtml+xml";
	$xhtml = 1;
} else {
	$contenttype = "text/html";
	$xhtml = 0;
}

echo header("Content-type: $contenttype; charset=utf-8"); 

?>