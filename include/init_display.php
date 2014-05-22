<?php

require_once "init.php";

require 'Smarty-3.1.16/libs/Smarty.class.php';
$smartyBase = new Smarty();

$smartyBase->setTemplateDir(Array($setting['apath'].'/templates'));
$smartyBase->setCompileDir($setting['apath'].'/smarty/templates_c');
$smartyBase->setCacheDir($setting['apath'].'/smarty/cache');
$smartyBase->setConfigDir($setting['apath'].'/smarty/configs');

$smartyBase->muteExpectedErrors();

$smartyBase->assign('section',SECTION);
$smartyBase->assign('setting',$setting);
$smartyBase->assign('user',$user);

$smarty = clone $smartyBase;
