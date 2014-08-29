<?php

require_once "settings.php";
require_once "definition.php";
require_once "foondb/db.class.php";
require_once "foonuser/user.class.php";

require_once "local_functions.php";
require_once "heraldry_functions.php";

spl_autoload_register('classAutoLoader');

$today = time();

$dsn = "{$setting['db']['type']}:dbname={$setting['db']['name']};host={$setting['db']['server']}";
$GLOBALS['db'] = new db($dsn,$setting['db']['user'],$setting['db']['password']);
$GLOBALS['db']->schema($setting['schema'],true);

// This application will not use php sessions. It implements it's own session management with it's own cookie token.
// Keep in mind that $token can be defined before calling init.php
if (!isset($token)) {
    // In case $token is not defined.
    $token = null;
}
if (empty($token) && !empty($_COOKIE['userToken'])) {
    $token = $_COOKIE['userToken'];
}
$user = new user($token);
if (isset($_POST['login']) && isset($_POST['passwd'])) {
    // Attempt a password login
    if (!$user->login($_POST['login'],$_POST['passwd'])) {
        // Handle failed login
        header("Location: //".$_SERVER["HTTP_HOST"]."/login?message=Login+Failed");
        exit();
    }
}

/*define the default template */
if (empty($_GET['template'])) {
	$template = "main";
} else {
	$template = $_GET['template'];
}
