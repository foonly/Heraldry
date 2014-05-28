<?php

require_once "init.php";
$user->setCookie(); // Called here because non-display templates can't set cookies.

require 'Smarty-3.1.16/libs/Smarty.class.php';
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
