<?php

require("../globals/init.inc");

if (empty($setting['dev']))
    die("Only allowed in dev mode");

header("Content-type: image/svg+xml; charset=utf-8"); 
header("Content-Disposition: inline; filename=test.svg");

$coa = new coa();

$coa->setDivision("per_bend");
$coa->addOrdinary("saltire","azure");

echo $coa->render();

?>