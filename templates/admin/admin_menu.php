<?php

$menu = array(
    array("tpl"=>"main","name"=>"Main"),
    array("tpl"=>"charges","name"=>"Charges"),
    array("tpl"=>"blog_list","name"=>"News"),
    array("tpl"=>"user_list","name"=>"Users"),
);

$smarty->assign("menu",$menu);
