<?php

require_once "settings.php";

if ($setting['dev']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

require_once "../lib/foondb/db.class.php";
require_once "../lib/foonuser/user.class.php";
require_once "../functions/heraldryUser.php";

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
$user = new heraldryUser($token);
//$user = new user($token);

//check login when sent from login form
if (isset($_POST['login']) && isset($_POST['passwd'])) {
    // Attempt a password login
    if (!$user->login($_POST['login'],$_POST['passwd'])) {
        // Handle failed login
        header("Location: //".$_SERVER["HTTP_HOST"].$setting['rpath']."/index.php?template=login");
        exit();
    }
    // Login succeeded
    $user->setCookie();
	
}
/*if user is logged in, run this*/
if ($user->getId()) {
	//lvl test, clean up later
	$plvl = $user->fetchLvl($user->getId());
	foreach ($plvl as $lvl) {
		
		$user->setLvl($lvl);
	}
}

/*
$email = "tommy@uplink.fi";

$user->recover($email);
*/

//$user->newPasswd("","8c941ba1-c3d2-46b5-aa1b-0e590dca5a48%3B1471511221%3B1800%3B55b9873b54582cf78c35181e198b0510334a9cb7e50e9e36bdec1df217ced5a4");



?>