<?php

session_start();

require_once "settings.php";
require_once "foondb/db.class.php";

require_once "local_functions.php";

spl_autoload_register('classloader');

$today = time();

$dsn = "{$setting['db']['type']}:dbname={$setting['db']['name']};host={$setting['db']['server']}";
$db = new db($dsn,$setting['db']['user'],$setting['db']['password']);

if (strstr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml")) {
    define("CONTENTTYPE","application/xhtml+xml");
    define("XHTML",true);
} else {
    define("CONTENTTYPE","text/html");
    define("XHTML",false);
}

echo header("Content-type: ".CONTENTTYPE."; charset=utf-8");

/*define the default template */
if (!$_GET[template]) {
	$template = "main";
} else {
	$template = $_GET[template];
}
