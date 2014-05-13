<?php

// TODO Check these

require('Smarty-3.1.16/libs/Smarty.class.php');
$smartyBase = new Smarty();

$smartyBase->setTemplateDir(Array($setting['apath'].'/smarty/templates',$setting['apath'].'/templates'));
$smartyBase->setCompileDir($setting['apath'].'/smarty/templates_c');
$smartyBase->setCacheDir($setting['apath'].'/smarty/cache');
$smartyBase->setConfigDir($setting['apath'].'/smarty/configs');

$smartyBase->muteExpectedErrors();

$smartyBase->assign('setting',$setting);
$smartyBase->assign('user',$user);
$smartyBase->assign('menu',$menu);

$smarty = clone $smartyBase;

?>