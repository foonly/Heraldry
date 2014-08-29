<?php

require_once "init.php";

if (!empty($_SERVER["HTTP_ACCEPT"]) && strstr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml")) {
    define("CONTENTTYPE","application/xhtml+xml");
    define("XHTML",true);
} else {
    define("CONTENTTYPE","text/html");
    define("XHTML",false);
}

echo header("Content-type: ".CONTENTTYPE."; charset=utf-8");


$user->setCookie(); // Called here because non-display templates can't set cookies.

require 'Smarty-3.1.19/libs/Smarty.class.php';
$smartyBase = new Smarty();

$smartyBase->setTemplateDir(Array($setting['apath'].'/templates',$setting['apath'].'/templates/'.SECTION));
$smartyBase->setCompileDir($setting['apath'].'/smarty/templates_c');
$smartyBase->setCacheDir($setting['apath'].'/smarty/cache');
$smartyBase->setConfigDir($setting['apath'].'/smarty/configs');

$smartyBase->muteExpectedErrors();

$smartyBase->assign('section',SECTION);
$smartyBase->assign('setting',$setting);
$smartyBase->assign('user',$user);

$smarty = clone $smartyBase;

// Check that called template is valid, index.tpl will later include it.
if ($smarty->TemplateExists("{$template}.tpl") && $template != "index") {
    $smarty->assign("template",$template);
} else {
    $smarty->assign("template","");
}
