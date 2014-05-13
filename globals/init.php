<?php

session_start();

include "settings.php";
include "foondb/db.class.php";

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

?>