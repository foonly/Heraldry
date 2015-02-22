<?php

$menu = array(
    array("tpl"=>linkTo("main"),"name"=>"News"),
    array("tpl"=>linkTo("coat"),"name"=>"Coat of Arms"),
    array("tpl"=>linkTo("contact"),"name"=>"Contact"),
);

$smarty->assign("menu",$menu);
